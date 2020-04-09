<form action="{{url('/productos/'.$producto->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

<label for="Nombre">{{'Nombre:'}}</label>
<input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}">
<br/>
<label for="Tipo">{{'Tipo:'}}</label>
<input type="text" name="tipo" id="tipo" value="{{$producto->tipo}}">
<br/>
<label for="Imagen">{{'Imagen:'}}</label>
<br/>
<img src="{{asset('storage').'/'.$producto->imagen}}" alt="" width="150">
<br/>
<input type="file" name="imagen" id="imagen" value="">
<br/>
<label for="Descripcion">{{'Descripcion:'}}</label>
<input type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}">
<br/>
<br>
<label for="Precio">{{'Precio:'}}</label>
<input type="text" name="precio" id="precio" value="{{$producto->precio}}">
<br/>
<br>
<label for="Cantidad">{{'Cantidad:'}}</label>
<input type="text" name="cantidad" id="cantidad" value="{{$producto->cantidad}}">
<br/>
<input type="submit" name="" value="Editar">
<br/>
<a href="{{url('productos')}}">Regresar</a>

</form>