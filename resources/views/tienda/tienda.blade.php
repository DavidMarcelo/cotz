<!DOCTYPE html>
<html>
<head>
    <title>Agregar productos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/app-assets/css/materialize.min.css') }}" media="screen,projection"/>
    <link rel="stylesheet" href="{{ asset('/app-assets/css/productos.css') }}" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    @if ($cont > 0)
    <div class="row"> 
        @foreach($Productos as $producto)
        <div class="col l3">
            <div class="card z-depth-5">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{asset('storage/'.$producto->Imagen)}}" height="300px" alt="" >
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{$producto->Nombre}}<i class="material-icons right">more_vert</i></span>
                    <form method="post" action="{{url('/tienda')}}">
                        {{csrf_field()}}
                        <input class="form-control" type="hidden" name="id" id="id" value="{{$loop->iteration}}">
                        <input class="form-control" type="hidden" name="nombre" id="nombre" value="{{$producto->Nombre}}">
                        <div class="input-field">
                            <label>Cantidad:</label>
                            <input class="form-control" type="number" name="cantidad" id="cantidad" value="1" min="1" max="{{$producto->Cantidad}}">
                        </div>
                        <input class="form-control" type="hidden" name="precio" id="precio" value="{{$producto->Precio}}">

                        <button type="submit" class="waves-effect waves-red btn green"
                        value="Agregar" name="btnAction">Agregar ha carrito</button>
                    </form>
                    </p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{$producto->Tipo}}<i class="material-icons right">close</i></span>
                    <p>{{$producto->Descripcion}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="row">
        <div class="col l6 offset-l3 center">
            <h4>No hay productos que mostrar...</h4>
            <a href="{{url('/')}}">Regresar al inicio</a>
        </div>
    </div>
    @endif
    
    <script type="text/javascript" src="{{asset('/app-assets/js/materialize.min.js')}}"></script>
</body>
</html>