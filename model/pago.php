<?php
error_reporting(0);

require_once '../config/database.php';
require_once '../model/config.php';
include_once("conexion.php");

/* error_reporting(0); */


$db = new  Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

/* print_r($_SESSION); */

$lista_carrito = array();

if($productos != null){
    foreach($productos as $clave => $cantidad){
        $sql = $con->prepare("SELECT codigo, nombre, precio_normal, $cantidad AS cantidad FROM mibase1.productos WHERE codigo=?");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: ../view/index.php");
    exit;
}

?>
<?php include_once("../include/estilos.php"); ?>

<?php include_once("../include/head.php"); ?>

<br>
<h1 style="text-align:center">PAGO DE PEDIDO</h1>
<br>

<main>
    <div class="container">

    <div class="row">
        <div class="col-6">
            <h4>Detalles de pago</h4>
            <form action="" method="POST">
            <center> 
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                        <button name="realizarPago" class="btn btn-primary btn-lg" >Pagar</button>
                    </div>
                </div>
                </center>
            </form>
        </div>

        <div class="col-6">
    

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($lista_carrito == null){
                                echo '<tr><td colspan="5" class="text-center"><b>Lista vacía</b></td></tr>';
                            }else{ 
                                
                                $total = 0;
                                foreach($lista_carrito as $producto){
                                    $_id = $producto['codigo'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio_normal'];
                                    $cantidad = $producto['cantidad'];
                                    $subtotal = $cantidad * $precio;
                                    $total += $subtotal;                        
                                ?>
                            
                            
                            <tr>
                                <td><?php echo $nombre ?></td>                       
                                <td>
                                    <div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                                </td>
                            </tr>
                            <?php } ?>

                            <tr>                                
                                <td colspan="2">
                                    <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                                </td>
                            </tr>


                        </tbody>
                    <?php } ?>
                    </table>
                </div>            
        </div>
    </div>
</div>
</main>


<?php $totalDol = $total/4; ?>

<?php require_once("./captura.php"); ?>


<!-- Script paypal -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=<?php /* echo CLIENT_ID; */ ?>&currency=<?php /* echo CURRENCY; */ ?>"></script> -->



<!-- <script>    

    paypal.Buttons({
        style:{
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions){
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php /* echo $totalDol; */ ?>
                    }
                }]
            });
        },

        onApprove: function(data, actions){
            let URL = './captura.php'
            actions.order.capture().then(function (detalles){
                
                console.log(detalles)

                let url = './captura.php'

                return fetch(url, {
                    method: 'post',
                    headers: {                        
                        'content-type': 'application/json'                        
                    },
                    body: JSON.stringify({
                        detalles: detalles    
                        
                    })
                }).then(response => response.text())                
            });
        },

        onCancel: function(data){
            alert("Pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script> -->

<?php include("../include/footer.php"); ?>