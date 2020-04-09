<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datos['productos'] = Productos::paginate(5);

        return view('productos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //$datosProductos = request()->all();
        $datosProductos = request()->except('_token');
        //Para insertar la foto
        if($request->hasFile('imagen')){
            $datosProductos['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Productos::insert($datosProductos);

        //regreso todo lo que envio del crear como un archivo json.
        //return response()->json($datosProductos);
        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos){
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $producto = Productos::findOrFail($id);
        //return view('productos.crear');
        return view('productos.editar', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $datosProductos = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $producto = Productos::findOrFail($id);
            
            Storage::delete('public/'.$producto->imagen);
            
            $datosProductos['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        Productos::where('id','=',$id)->update($datosProductos);

        $producto = Productos::findOrFail($id);
        //return view('productos.crear');
        return view('productos.editar', compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $producto = Productos::findOrFail($id);
        if(Storage::delete('public/'.$producto->imagen)){
            Productos::destroy($id);
        }

        return redirect('productos');
    }
}
