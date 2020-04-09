@extends('cafes.navbar')
@section('css')
<title>Cotz</title>
<link rel="stylesheet" href="{{asset('app-assets/css/nosotros.css')}}">
@endsection('css')
@section('content')
    <div class="container">
        <div class="title"><h1>Nosotros</h1> </div>
        <div class="tzeltal">
            <label class="letraTzeltal">Táan u yaja ch`újsajil le<br>sübal u na´ lu `um</label>
        </div>
        <div class="atributos">
            <div class="card"> 
                <label class="txtcard">Mision</label><br>
                <label style="font-size: 18px"  >Ser una plataforma consolidada apoyando a pequeños y medianos distribuidores y productores a vender café con un comercio justo.</label> 
            </div>
            <div class="card"> 
                <label class="txtcard">Vision</label><br>
                <label style="font-size: 18px">Ser una empresa posicionada en el mercado nacional, europeo y americano, con alto sentido de responsabilidad social, contando con varias empresas comprometidas con el medio ambiente , vendiendo un café de alta calidad</label> 
            </div>
        </div>
    </div>
@endsection('content')