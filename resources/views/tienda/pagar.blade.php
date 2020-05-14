<!DOCTYPE html>
<html>
<head>
    <title>Agregar productos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/app-assets/css/materialize.min.css') }}" media="screen,projection"/>
    <link rel="stylesheet" href="{{ asset('/app-assets/css/productos.css') }}" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
</head>
<body>
    <div class="jumbotron text-center">
        <h1 class="display-4">¡Paso final!</h1>
        <hr class="my-4">
        <p class="lead">Estas a punto de pagara con paypal la cantidad: 
            <h4>${{number_format($total,2)}}</h4>
        </p>
        
        <div id="paypal-button-container"></div>
        <p></p>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
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
    <script type="text/javascript" src="{{asset('/app-assets/js/materialize.min.js')}}"></script>
</body>
</html>