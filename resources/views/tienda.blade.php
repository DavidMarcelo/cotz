@extends('cafes.navbar')
@section('css')
<title>Tienda</title>
<link rel="stylesheet" href="{{asset('app-assets/css/tienda.css')}}">
@endsection('css')
@section('content')
    <div class="container">
        <img src="{{asset('app-assets/imagenes/6.png')}}" alt="" width="100%">
        <img src="{{asset('app-assets/imagenes/Logo_sin_fondo.png')}}" alt="" width="30%" class="top-right">
        <div class="centered-right"><a href="" style="color: green; font-size: 45px; text-decoration: none;">Cafe <br> Gourmet</a></div>
        <div class="centered-right2"><a href="" style="color: green; font-size: 45px; text-decoration: none;">Cafe <br> Marago</a></div>
    </div>
    
    <div class="container">
        <img src="{{asset('app-assets/imagenes/8.png')}}" alt="" width="100%">
        <div class="centered-left txtcaja">
            
            <div style="color: green; font-size: 45px;">Cafe Gourmet</div><br>
            <label>
                Cafe que ha sido seleccionado desde
                la semilla que da lugar a la planta
                la cual es ubicada en una zona con el
                microclima y la altura(minimo 1000 msnm)
                adecuados para su correcto crecimiento,maduraciòn,floraciòn y
                crecimiento de sus futos.
            </label>
        </div>
        <div class="centered-left2">
            <ul>
                <li>Intensidad</li>
                <li>Cuerpo</li>
                <li>Tueste</li>
            </ul>
        </div>
        <div class="centered-right3">
            <button class="btnbuy"><a class="anyline" href="formato.html">Comprar</a></button>
        </div>
    </div>
    <div class="container">
        <img src="{{asset('app-assets/imagenes/10.png')}}" alt="" width="100%">
        <div class="centered-left txtcaja">
            
            <div style="color: green; font-size: 45px;">Cafe Marago</div><br>
            <label>
                Este cafe se caracteriza por una acidez intermedia sin ser tan
                fuerte como otras variedades, es un cafe especial debido a que los
                los granos son grandes y uniformes, asi como donde se cultiva 
                tiene que ser en terrenos mayores de 1000 s.n.m haciendolo un
                cafe estrictamente de altura, reconocido mundialmente por su
                excelente calidad, aroma excepcional y gran sabor.
            </label>
        </div>
        <div class="centered-left2">
            <ul>
                <li>Intensidad</li>
                <li>Cuerpo</li>
                <li>Tueste</li>
            </ul>
        </div>
        <div class="centered-right3">
            <button class="btnbuy"><a class="anyline" href="formato.html">Comprar</a></button>
        </div>
    </div>
@endsection('content')