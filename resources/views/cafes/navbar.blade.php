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
                <a href="/productos">Nuestro Café</a>
                <a href="">Compra Online</a>
                <a href="">Nosotros</a>
                <button class="login">Iniciar Sesion</button>
                <button class="register">Registrarse</button>
            </div>
        </div>                
    </header>
    @yield('content')
</body>
</html>