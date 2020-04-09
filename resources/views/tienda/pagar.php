
<?php 
if ($_POST){
    $total = 0;
    $SID = session_id();
    $correo = $_POST['email'];
    foreach($_SESSION['CARRITO'] as $indice=>$producto){
        $total = $total + ($producto['PRECIO']*$producto['CANTIDAD']);
    }
    $sentancia = $pdo->prepare("INSERT INTO ventas ('id', 'claveTransaccion', 'paypalDatos', 'fecha', 'correo', 'total', 'status') 
    values (null,:claveTransaccion, '', NOW(), :correo, :total, 'pendiente');");
    
    $sentancia->bindParam(":claveTransaccion", $SID);
    //$sentancia->bindParam(":claveTransaccion", $SID);
    //$sentancia->bindParam(":claveTransaccion", $SID);
    $sentancia->bindParam(":correo", $correo);
    $sentancia->bindParam(":total", $total);
    //$sentancia->bindParam(":claveTransaccion", $SID);
    
    $sentancia->execute();

    //entidad relacion
    $idVenta = $pdo->lastInsertId();

    foreach($_SESSION['CARRITO'] as $indice=>$producto){
        //$sentancia =  $pdo->prepare("INSERT INTO 'datelleventa' ('id', 'idVenta', 'idProducto', 'precioUnitario', 'cantidad', 'descargado') 
        //VALUE (NULL, :idVenta, :idProducto, :precioUnitario, :cantidad, 0);");
        $sentancia->bindParam(":idVenta", $idVenta);
        $sentancia->bindParam(":idProducto", $producto['ID']);
        $sentancia->bindParam(":precioUnitario", $producto['PRECIO']);
        $sentancia->bindParam(":cantidad", $producto['CANTIDAD']);

        $sentancia->execute();

    }
}
?>

<!-- Add meta tags for mobile and IE -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }
    
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
        }
    }
</style>

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagara con paypal la cantidad: 
        <h4>$<?php echo number_format($total,2);?></h4>
    </p>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <p></p>
</div>

<!-- Include the PayPal JavaScript SDK -->
<!--<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>-->
<script src="https://www.paypal.com/sdk/js?client-id=AYbs-NSoPEyxt29uqDvcM8msayZCdybRBQuRF7xvDjf_EJdj60BPHHBGDd8OODt1WEjT2NElgPliJ7T_&currency=MXN"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        style: {
            color:  'gold',
            shape:  'pill',
            label:  'checkout',
            size:   'responsive'
        },
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        total: '<?php echo $total; ?>', currency: 'MXN'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }


    }).render('#paypal-button-container');
</script>