<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['codigo'])) {
        require_once "config/conexion.php";
        $id = $_GET['codigo'];
        if ($_GET['accion'] == 'pro') {
            $query = mysqli_query($conexion, "DELETE FROM productos WHERE codigo = $id");
            if ($query) {
                header('Location: productos.php');
            }
        }
        if ($_GET['accion'] == 'cli') {
            $query = mysqli_query($conexion, "DELETE FROM categorias WHERE codigo = $id");
            if ($query) {
                header('Location: categorias.php');
            }
        }
    }
}
?>