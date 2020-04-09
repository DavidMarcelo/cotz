<!DOCTYPE html>
<html>
 <head>
    <link rel="stylesheet" href="{{ asset('/app-assets/css/productestilo.css') }}" />
 </head>
 <body>
    <header id="main-header">
		<a id="logo-header" href="#">
			<span class="site-name"><img src="/app-assets/imagenes/Logo_sin_fondo.png" width="70" height="45"></span>
			<span class="site-desc">Lista de productos</span>
		</a>
		<nav>
			<ul>
                <li><a href="{{url('/')}}" class="btn btn-success">Inicio</a></li>
                <li><a href="{{url('productos/create')}}">Agregar Producto</a></li>
			</ul>
		</nav>
 
	</header>
    
    <br/>

    <div class="container">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>TIPO</th>
                    <th>IMAGEN</th>
                    <th>DESCRIPCION</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->tipo}}</td>
                    <td>
                    <img src="{{asset('storage').'/'.$producto->imagen}}" alt="" width="120">
                    </td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>
                    <a href="{{url('/productos/'.$producto->id.'/edit')}}">
                    Editar
                    </a>
                    </td>
                    <td>
                    <form method="post" action="{{url('/productos/'.$producto->id)}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
 </body>
</html>
