<?php

include("conexion.php");
error_reporting(0);
session_start();

$idCliente = $_SESSION['idCliente'];

?>



<?php include("../include/head.php"); ?>

<br><br>

<div class="container-lg container-md container-sm">

    <h2>Compra Realizadas</h2> <br><br><br>

    <?php $query = mysqli_query($conexion, "SELECT t1.id, t1.fecha, t1.status, t1.total, t3.imagen FROM compra t1
                                            RIGHT JOIN detalle_compra t2 on (t1.id = t2.id_compra)
                                            INNER JOIN productos t3 on (t2.id_producto = t3.codigo)
                                            WHERE t1.id_cliente=$idCliente");
                    while ($data = mysqli_fetch_assoc($query)) { ?>

    <div class="Pedido">
        <div class="PedidoImagen">
            <img src="../admin/assets/img/<?php echo $data['imagen']; ?>" alt="" width="150px">
        </div>

        <div class="PedidoDetalle">
            <h4>ID del PEDIDO: <?php echo $data['id']; ?></h4>
            <h5>Fecha: <?php echo $data['fecha']; ?></h3>
            <h5>Estado del Pedido: <?php echo $data['status']; ?></h3>
            <h5>Total Pagado: <?php echo $data['total']; ?></h3>
        </div>
    </div>

    <br><br><br>

    <?php } ?>

</div>


<?php include("../include/footer.php"); ?>