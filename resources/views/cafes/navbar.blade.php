<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('app-assets/css/navbar.css')}}">
    @yield('css')    
</head>
 <body>
    <header id="header">
        <input type="checkbox" id="menubtn">
        <label for="menubtn" class="menulabel" id="menulabel"><img src="{{asset('app-assets/imagenes/menu.png')}}" height="20px"></label>
        <div class="menu">
            <div class="texturl">
                <a href="/tiendita">Nuestro Café</a>
                <a href="/tienda">Compra Online</a>
                <a href="/nosotros">Nosotros</a>
                @guest
                <a href="{{URL::route('login')}}" id="loginlabel">Iniciar Sesion</a>
                @if (Route::has('register'))
                <a href="{{URL::route('register')}}" id="registerlabel">Registrarse</a>
                @endif
                @else
                <div class="username">
                    <img src="{{asset('app-assets/imagenes/user.png')}}" height="15px">
                    <a href="">{{ Auth::user()->name }}</a>
                    <div class="listausers"><a href="/productos">Mis productos</a><br><br>
                    <a href="{{url('productos/create')}}">Agregar productos</a></div>
                </div>
                <a class="logoutlabel" href="{{ route('logout') }}" 
                onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesion') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
        </div>                
    </header>
    @yield('content')
</body>
</html>