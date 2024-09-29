<?php
include("conexion.php");
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}

/* print_r($_SESSION['usuario']);
print_r($_SESSION['idCliente']); */

include("../include/head.php"); ?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../img/slider-laptop3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../img/slider_laptop2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../img/slider-audifono3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Muestra de productos -->
<div class="productos-imgs">
    <div class="productos-content">
        <a class="prd-imagen" href="./producto_laptops.php"><img src="../img/producto-laptop.png" alt=""></a>
        <a class="prd-imagen" href="./producto_celulares.php"><img src="../img/producto-celular.png" alt=""></a>
        <a class="prd-imagen" href="./producto_audifonos.php"><img src="../img/producto-audifono.png" alt=""></a>
    </div>
</div>


<div class="boton-productos">
    <div class="btn-prd-inside">
        <a href="#">Productos</a>
    </div>
</div>
<br>
<h1 style="text-align:center">MEJORES PRODUCTOS</h1>
<br>
<?php

error_reporting(0);
require '../config/database.php';
include("conexion.php");

session_start();



$db = new  Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT codigo, nombre, descripcion, precio_normal, imagen FROM mibase1.productos ");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


?>
<main>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($resultado as $row) { ?>


                <div class="col">
                    <div class="card shadow-sm">
                        <?php
                        $codigo = $row['codigo'];
                        $imagen2 = $row['imagen'];

                        $imagen = "../admin/assets/img/" . $imagen2;
                        if (!file_exists($imagen)) {
                            $imagen = '../img/img-no-image.jpg';
                        }


                        ?>
                        <img class="card-img " src="<?php echo $imagen; ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['nombre']; ?></h4>
                            <P class="card-text">S/ <?php echo number_format($row['precio_normal'], 2, '.', ' '); ?></P>
                            <div class="d-flex justify-content-between">
                                <div class="btn-group">
                                    <a href="details.php?codigo=<?php echo $row['codigo']; ?>&token=<?php echo hash_hmac('sha1', $row['codigo'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                                    <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['codigo']; ?>, '<?php echo hash_hmac('sha1', $row['codigo'], KEY_TOKEN); ?>')">Agregar al carrito</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>




            
        </div>

    </div>

</main>



<div class="h2-destacada">
    <img src="../img/oferta-destacada-imagen.png" alt="">
</div>

<div class="content-ofertas">
    <!-- La imagen de oferta -->
    <div class="oferta-imagen">
        <img src="../img/oferta-celulares.webp" alt="">
    </div>
    <!-- La imagen de oferta -->
    <div class="oferta-imagen">
        <img src="../img/oferta-laptop.webp" alt="">
    </div>
    <!-- La imagen de oferta -->
    <div class="oferta-imagen">
        <img src="../img/oferta-audifonos.jpg" alt="">
    </div>


    <?php include("../include/footer.php"); ?>