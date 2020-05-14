<?php

namespace App\Http\Controllers;

use App\tienda;
use App\Productos;
use Illuminate\Http\Request;

class TiendaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //session()->flush();
        $Productos = Productos::all();
        $Carrito = (array) session()->all();
        $cont = 0;
        $bandera = 'inicio';
        for ($i=1; $i <= (count($Carrito)-3); $i++) {
            $cont+=1;
        }
        return view('tienda.tienda', compact('Productos', 'cont', 'bandera'), ['Carrito' => $Carrito]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //session()->flush();
        $Carrito = (array) session()->all();
        $cont = 0;
        $i = 1;
        $id = 0;
        $bandera = 'lista';
        while ($cont < (count($Carrito)-3)) {
            if(session()->has('CARRITO'.$i)){
                $cont++;
                $id = $Carrito['CARRITO'.$i][0]->ID;
            }
            $i++;
        }
        return view('tienda.carrito', compact('cont', 'id', 'bandera'), ['Carrito' => $Carrito]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $Carrito = (array) session()->all();
        $cont = 0;
        $bandera = 'inicio';
        if(isset($_POST['btnAction'])){
            switch($_POST['btnAction']){
                case 'Agregar':
                    //Si la varible de sesion contiene algo
                    if (session()->has('CARRITO'.$request->id)){//Existe
                        echo "<script>alert('El producto ya ha sido seleccionado');</script>";                        
                    }else{//No existe
                        $Carrito = (object) array('ID' => $request->id,
                                        'NOMBRE' => $request->nombre,
                                        'CANTIDAD' => $request->cantidad,
                                        'PRECIO' => $request->precio);
                        $request->session()->push('CARRITO'.$request->id, $Carrito);
                    }
                break;

                case 'Eliminar':
                    session()->forget('CARRITO'.$request->id);
                    $Carrito = (array) session()->all();
                    $cont = 0;
                    $i = 1;
                    $id = 0;
                    $bandera = 'lista';
                    while ($cont < (count($Carrito)-3)) {
                        if(session()->has('CARRITO'.$i)){
                            $cont++;
                            $id = $Carrito['CARRITO'.$i][0]->ID;
                        }
                        $i++;
                    }
                    return view('tienda.carrito', compact('cont', 'id', 'bandera'), ['Carrito' => $Carrito]);
                break;

                case 'Pagar':
                    //print_r("Pagar");
                    if ($_POST){
                        $bandera = 'pagar';
                        //print_r("Pagar 2");
                        $total = 0;
                        //$SID = session_id();
                        $correo = $request->email;
                        $Carrito = (array) session()->all();
                        $cont = 0;
                        $i = 1;
                        while ($cont < (count($Carrito)-3)) {
                            if(session()->has('CARRITO'.$i)){
                                $cont++;
                                $total = $total + ($Carrito['CARRITO'.$i][0]->PRECIO * $Carrito['CARRITO'.$i][0]->CANTIDAD);
                            }
                            $i++;
                        }
                        return view('tienda.pagar', compact('total', 'cont', 'bandera'));
                    }
                break;
            }
        }

        $Productos = Productos::all();
        $Carrito = (array) session()->all();
        if((count($Carrito)-3)>0){
            for ($i=0; $i < (count($Carrito)-3); $i++) { 
                $cont+=1;
            }
        }
        return view("tienda.tienda", compact('Productos', 'Carrito', 'cont', 'bandera'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show(tienda $tienda){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit(tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tienda $tienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(tienda $tienda)
    {
        //
    }
}
