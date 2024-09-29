
<?php

include("conexion.php");
error_reporting(0);
session_start();



?>



<?php include("../include/head.php"); ?>

<?php

    require '../config/database.php';    

    $db = new  Database();
    $con = $db->conectar();

    
    

        if(isset($_POST["buscarProdu"])){
            $str = $_POST["buscarProdu"];            
                
            $sql = $con->prepare("SELECT * FROM mibase1.productos WHERE nombre LIKE '%$str%'");            
            $sql -> fetchAll(PDO:: FETCH_ASSOC);
            $sql -> execute();
            

            
                ?>
                <br>
                        <h1 style="text-align:center">RESULTADO DE BÚSQUEDA</h1>
                        <br>

                        <main>
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                    <?php foreach ($sql as $row2) { ?>


                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <?php
                                                $codigo = $row2['codigo'];
                                                $imagen2 = $row2['imagen'];

                                                $imagen = "../admin/assets/img/" . $imagen2;
                                                if (!file_exists($imagen)) {
                                                    $imagen = '../img/img-no-image.jpg';
                                                }


                                                ?>
                                                <img class="card-img " src="<?php echo $imagen; ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $row2['nombre']; ?></h4>
                                                    <P class="card-text">S/ <?php echo number_format($row2['precio_normal'], 2, '.', ' '); ?></P>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="btn-group">
                                                            <a href="details.php?codigo=<?php echo $row2['codigo']; ?>&token=<?php echo hash_hmac('sha1', $row2['codigo'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
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
                <?php             
        
        }
        
        
        
    
?>

<?php include("../include/footer.php"); ?>