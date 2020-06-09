<!-- <form method="post" action="{{url('/productos')}}" enctype="multipart/form-data">
{{csrf_field()}}
<label for="Nombre">{{'Nombre:'}}</label>
<input type="text" name="nombre" id="nombre" value="">
<br/>
<label for="Tipo">{{'Tipo:'}}</label>
<input type="text" name="tipo" id="tipo" value="">
<br/>
<label for="Imagen">{{'Imagen:'}}</label>
<input type="file" name="imagen" id="imagen" value="">
<br/>
<label for="Descripcion">{{'Descripcion:'}}</label>
<input type="text" name="descripcion" id="descripcion" value="">
<br/>
<br>
<label for="Precio">{{'Precio:'}}</label>
<input type="text" name="precio" id="precio" value="">
<br/>
<br>
<label for="Cantidad">{{'Cantidad:'}}</label>
<input type="text" name="Cantidad" id="Cantidad" value="">
<br/>
<input type="submit" name="" value="Agregar">
<br/>
<a href="{{url('productos')}}">Regresar</a>

</form> -->
@extends('cafes.navbar')
@section('css')
<title>Agregar Producto</title>
<link rel="stylesheet" href="{{asset('app-assets/css/agregar.css')}}">
@endsection('css')
@section('content')
<div class="centercard">
    <div class="card"> {{ __('Registrar producto') }}
    @if ($errors->any())
    <div class="alerttext">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <br>
        <br>
        <form method="post" action="{{url('/productos')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="Nombre">{{'Nombre'}}</label><br>
            <input type="text" name="nombre" id="nombre" value=""></p>
            <label for="Tipo">{{'Tipo'}}</label><br>
            <input type="text" name="tipo" id="tipo" value=""></p>
            <label for="Imagen">{{'Imagen'}}</label><br>
            <input type="file" name="imagen" id="imagen" value=""></p>
            <label for="Descripcion">{{'Descripcion'}}</label><br>
            <input type="text" name="descripcion" id="descripcion" value=""></p>
            <label for="Precio">{{'Precio'}}</label><br>
            <input type="text" name="precio" id="precio" value=""></p>
            <label for="Cantidad">{{'Cantidad'}}</label><br>
            <input type="text" name="Cantidad" id="Cantidad" value=""></p><br>
            <div class="row justify-content-center">
                <input type="submit" name="" value="Agregar">
            </div>
        </form>
    </div>
</div>
@endsection