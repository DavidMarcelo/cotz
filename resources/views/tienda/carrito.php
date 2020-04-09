<?php

session_start();
$mensaje = "";

if(isset($_POST['btnAddCar'])){
    switch($_POST['btnAddCar']){
        case 'Agregar':
            //desencriptar id
            if(is_numeric(openssl_decrypt($_POST['id'], COD, KEY))){
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "Se agrego el ".$ID;
            }else{  
                $mensaje .= "Error al agregar...";
            }
            //Nombre
            if(is_string(openssl_decrypt($_POST['nombre'], COD, KEY))){
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje .= "Se agrego ".$NOMBRE;
            }else{
                $mensaje .= "Error al agregar...";
            }
            //Precio
            if(is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))){
                $PRECIO = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "Se agrego ".$PRECIO;
            }else{
                $mensaje .= "Error al agregar...";
            }
            //Cantidad
            if(is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))){
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensaje .= "Se agergo ".$CANTIDAD;
            }else{
                $mensaje .= "Error al agregar...";
            }

            //Variables de sesion para almacenar informacion al carrito
            if(!isset($_SESSION['CARRITO'])){
                $producto = array('ID'=>$ID,
                            'NOMBRE'=>$NOMBRE, 
                            'PRECIO'=>$PRECIO, 
                            'CANTIDAD'=>$CANTIDAD);
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado";
            }else{
                $idProductos =  array_column($_SESSION['CARRITO'], "ID");
                if (in_array($ID, $idProductos)){
                    echo "<script>alert('El producto ya ha sido seleccionado');</script>";
                    $mensaje = "";
                }else{
                    $numerodeproductos = count($_SESSION['CARRITO']);
                    $producto = array('ID'=>$ID,
                                'NOMBRE'=>$NOMBRE, 
                                'PRECIO'=>$PRECIO, 
                                'CANTIDAD'=>$CANTIDAD);
                    $_SESSION['CARRITO'][$numerodeproductos] = $producto;
                    $mensaje = "Producto agregado";
                }
            }

        break;

        case 'Eliminar':
            if(is_numeric(openssl_decrypt($_POST['id'], COD, KEY))){
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['id']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('Elemento borrado');</script>";
                    }

                }
            }else{
                $mensaje = "Error no se pudo eliminar...";
            }

        break;
    }
}

?>