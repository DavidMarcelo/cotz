<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/app-assets/css/materialize.min.css') }}" media="screen,projection"/>
        <link rel="stylesheet" href="{{ asset('/app-assets/css/cabecera.css') }}" />
        @yield('css')
    </head>
    <body>
        <nav class="navbar z-depth-5">
            <a class="navbar-brand">Electronica</a>
            @if ($bandera == 'lista')
                <a href="{{url('/tienda')}}">Regresar</a>
            @elseif ($cont >= 1 and $bandera == 'inicio')
                <a href="{{url('/tienda/create')}}"><img class="nav-brand" src="/app-assets/imagenes/car3.png" height="60px"></a>
                <div class="circulo_rojo">
                    <div>
                        <div>{{$cont}}</div>
                    </div>
                </div>
            @elseif ($cont >= 1 and $bandera == 'pagar')
                <a href="{{url('/tienda')}}">Regresar</a>
            @elseif ($bandera == 'welcome')
                <a class="nav-brand"><i class="material-icons">menu</i></a>
            @else
                <a class="nav-brand"><i class="material-icons">menu</i></a>
            @endif
            <div id="my-nav" class="navbar-collapse">
                <ul class="mr-auto">
                    <li class="nav-item">
                        <div class="nav-wrapper">
                            <form>
                                <div class="input-field">
                                <input id="search" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/inicio')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1">Iniciar sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/producto')}}" tabindex="-1">Productos</a>
                    </li>
                </ul>
            </div>
        </nav>

        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="images/office.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div>
            </li>
            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
            <li><a href="#!">Second Link</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>
        
        

        <script type="text/javascript" src="{{asset('/app-assets/js/materialize.min.js')}}"></script>
        @yield('content')
    </body>
</html>