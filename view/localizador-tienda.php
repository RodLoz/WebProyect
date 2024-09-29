<?php   
    error_reporting(0);
    session_start();
    include("conexion.php");  
?>

<?php include("../include/head.php"); ?>

<center> 
<div class="container-mapa">
        <div class="checkbox-Tienda">
            <h1>Localizador de tienda</h1>           
        </div>
        <div class="checkbox-Tienda">
            <h5>Encuentra la tienda Deluxe Products más cercana</h5>
        </div>
        <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3995255.671961337!2d-77.030336!3d-12.069861000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x249da1f928ec45b1!2sCoolbox!5e0!3m2!1ses-419!2sus!4v1665638086991!5m2!1ses-419!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
 </center>
        <?php include("../include/footer.php"); ?>