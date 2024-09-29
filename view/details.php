<?php


require '../config/database.php';
include("conexion.php");
require '../model/config.php';

error_reporting(0);



$db = new  Database();
$con = $db->conectar();

/* Capturar token */
$id = isset($_GET['codigo']) ? $_GET['codigo'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
    echo 'Error al procesar la petición';
    exit;
}else{

     $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if($token == $token_tmp){   

        $sql = $con->prepare("SELECT count(codigo) FROM mibase1.productos WHERE codigo=?");     
        $sql -> execute([$id]);
        if($sql->fetchColumn() > 0){
            $sql = $con->prepare("SELECT nombre, descripcion, precio_normal, imagen FROM mibase1.productos WHERE codigo=? LIMIT 1");                 
            $sql -> execute([$id]);
            $row = $sql -> fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio_normal'];

            $imagen2 = $row['imagen'];

            $imagen = "../admin/assets/img/" . $imagen2;   
            if (!file_exists($imagen)) {
                $imagen = '../img/img-no-image.jpg';
            }   
        }
        
     } else {
        echo 'Error al procesar la petición';
        exit;
    } 
}

$sql = $con->prepare("SELECT codigo, nombre, descripcion, precio_normal, imagen FROM mibase1.productos WHERE idcategoria=4");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


?>
<?php include("../include/estilos.php"); ?>

<?php include("../include/head.php"); ?>

<br>

<h1 style="text-align:center">DELUXE PRODUCTS</h1>
<br>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-1">
                <img class="card-img" src="<?php echo $imagen; ?>">
            </div>
            <div class="col-md-6 order-md-2">
                <h2><?php echo $nombre; ?></h2>
                <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>
                <p class="lead">
                    <?php echo $descripcion; ?>
                </p>

                <div class="d-grid gap-3 col-10 mx-auto">
                    <button class="btn btn-primary" type="button">Comprar ahora</button>
                    <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
</main>
<h1 style="text-align:center">RECOMENDACIONES</h1>

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
                            <div class="d-flex justify-content-around">
                                <!-- <div class="btn-group"> -->
                                <a href="details.php?codigo=<?php echo $row['codigo']; ?>&token=<?php echo hash_hmac('sha1', $row['codigo'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                                <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['codigo']; ?>, '<?php echo hash_hmac('sha1', $row['codigo'], KEY_TOKEN); ?>')">Agregar al carrito</button>

                                <!-- </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</main>
<?php include("../include/footer.php"); ?>