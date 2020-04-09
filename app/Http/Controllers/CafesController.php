<?php

namespace App\Http\Controllers;

use App\Cafes;
use Illuminate\Http\Request;

class CafesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index');
    }

    public function nosotros()
    {
        //
        return view('nosotros');
    }


    public function tienda()
    {
        //
        return view('tienda');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cafes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // esto almacena todo lo que se envia aqui
        $datosCafe = request()->all();
        return response()->json($datosCafe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cafes  $cafes
     * @return \Illuminate\Http\Response
     */
    public function show(Cafes $cafes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cafes  $cafes
     * @return \Illuminate\Http\Response
     */
    public function edit(Cafes $cafes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cafes  $cafes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cafes $cafes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cafes  $cafes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cafes $cafes)
    {
        //
    }
}
