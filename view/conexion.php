<?php
    
    $conexion=mysqli_connect("localhost","root","","mibase1");

    mysqli_set_charset($conexion, "utf8");
    
   /*
    if($conexion){
        echo'conectado con exito a la base de datos';
    }else{
        echo'no se puedo conectar a la base de datos';
    }
   */

?>    