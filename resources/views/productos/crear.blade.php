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
@extends('layouts.agregar_productos')
@section('content')

    <div class="row justify-content-center">
                <div class="card"> {{ __('Registrar producto') }}
                <br>
                <br>
                <form method="post" action="{{url('/productos')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <label for="Nombre">{{'Nombre:'}}</label>
                    <input type="text" name="nombre" id="nombre" value="">
                    <br>
                    <br>
                    <label for="Tipo">{{'Tipo:'}}</label>
                    <input type="text" name="tipo" id="tipo" value="">
                    <br>
                    <br>
                    <label for="Imagen">{{'Imagen:'}}</label>
                    <input type="file" name="imagen" id="imagen" value="">
                    <br>
                    <br>    
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
                    <br>
                    <br>
                    <div class="row justify-content-center">
                        <input type="submit" name="" value="Agregar">
                    </div>
                    <br/>
                    <a href="{{url('productos')}}">Regresar</a>
                </form>
                </div>
    </div>
@endsection