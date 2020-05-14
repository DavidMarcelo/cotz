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
    @if ($cont >= 1)
        <table class="table table-light table-bordered">
            <tbody>
                <tr>
                    <th width="40%">Descripcion</th>
                    <th width="15%" class="text-center">Cantidad</th>
                    <th width="20%" class="text-center">Precio</th>
                    <th width="20%" class="text-center">Total</th>
                    <th width="5%" >--</th>
                </tr>
                <?php $total = 0 ;?>
                @for ($i=1; $i <= $id; $i++)
                @if (session()->has('CARRITO'.$i))
                <tr>
                    <td width="40%">{{$Carrito['CARRITO'.$i][0]->NOMBRE}}</td>
                    <td width="15%" class="text-center">{{$Carrito['CARRITO'.$i][0]->CANTIDAD}}</td>
                    <td width="20%" class="text-center">${{$Carrito['CARRITO'.$i][0]->PRECIO}}</td>
                    <td width="20%" class="text-center">${{number_format($Carrito['CARRITO'.$i][0]->CANTIDAD * $Carrito['CARRITO'.$i][0]->PRECIO, 2)}}</td>
                    <td>
                        <form method="post" action="{{url('/tienda')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id" 
                            value="{{$Carrito['CARRITO'.$i][0]->ID}}"></input>
                            <button width="5%" class="btn red" type="submit"
                            name="btnAction" value="Eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php $total = $total + ($Carrito['CARRITO'.$i][0]->CANTIDAD * $Carrito['CARRITO'.$i][0]->PRECIO); ?>
                @endif
                @endfor
                <tr>
                    <td colspan="3" align="right"> <h3>Total</h3></td>
                    <td align="right"><h3>${{number_format($total, 2)}}</h3></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="5">
                    <div class="row">
                    <div class="col l5 offset-l3">
                        <form method="post" action="{{url('/tienda')}}">
                            {{csrf_field()}}
                            <div class="alert alert-success">
                                <div class="form-group">
                                    <label for="correoLabel">Correo de contacto: </label>
                                    <input class="email" name="email" type="email"
                                    placeholder="Escribe tu correo" required>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">
                                    Los productos se enviaran ha este correo
                                </small>
                            </div>
                            <div class="offset-1">
                            <button class="btn btn-primary btn-lg btn-block" type="submit"
                            value="Pagar" name="btnAction">
                                Pagar >>
                            </button>
                            </div>
                        </form>
                    </div>
                    </div>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert alert-success">
            No hay productos en el carrito.
        </div>
    @endif
    
    
    <script type="text/javascript" src="{{asset('/app-assets/js/materialize.min.js')}}"></script>
</body>
</html>