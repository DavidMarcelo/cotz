<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
        <?php if($mensaje!=""){ ?>
        <div class="alert aler-success">
            <?php echo $mensaje; ?>
            <a href="tienda/mostrarCarrito" class="badge badge-success">Ver carrito</a>
        </div>
        <?php } ?>

        <div class="row">
            <?php
            $sentancia = $pdo->prepare("SELECT * FROM productos");
            $sentancia->execute();
            $listaProductos = $sentancia->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($listaProductos as $producto){ ?>
            <div class="col-3">
                <div class="card">
                    <img class="card-img-top"
                    height="317px"
                    src="<?php echo asset('storage').'/'.$producto['imagen'];?>"
                    title="<?php echo $producto['nombre']; ?>" alt="titulo"
                    data-toggle="popover"
                    data-trigger="hover"
                    data-content="<?php echo $producto['descripcion']; ?>"
                    >
                    <div class="card-body">
                        <span><?php echo $producto['nombre']; ?></span>
                        <h5 class="card-title">$<?php echo $producto['precio']; ?></h5>
                        <p class="card-text"><?php echo $producto['tipo']; ?></p>

                        <form method="post" action="">
                            <?php csrf_field() ?>
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                            
                            <button class="btn btn-primary" type="submit" 
                            value="Agregar" name="btnAddCar">Agregar al carrito</button>

                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>

    <!--</div>-->
    <script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    });
    </script>

<?php 
include 'templates/pie.php';
?>
