<?php

namespace App\Http\Controllers;

use App\tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tienda.index');
    }

    /*public function nosotros()
    {
        //
        return view('nosotros');
    }*/


    /*public function tienda()
    {
        //
        return view('tienda');
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
        return view('cafes.create');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show(tienda $tienda)
    {
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
