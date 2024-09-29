<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('location: productos.php');
} else {
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['nombre']) || empty($_POST['contraseña'])) {
            $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                        Ingrese nombre y contraseña
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } else {
            require_once "config/conexion.php";
            $user = mysqli_real_escape_string($conexion, $_POST['nombre']);
            $contraseña = md5(mysqli_real_escape_string($conexion, $_POST['contraseña']));
            $query = mysqli_query($conexion, "SELECT * FROM administrador WHERE nombre = '$user' AND contraseña = '$contraseña'");
            mysqli_close($conexion);
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['id'] = $dato['id'];
                $_SESSION['nombre'] = $dato['nombre'];
                $_SESSION['user'] = $dato['nombre'];
                header('Location: productos.php');
            } else {
                $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                        Contraseña incorrecta
                       
                    </div>';
                session_destroy();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Products</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="loginbox" method="POST" action="" autocomplete="off">
        <img src="assets/img/admin.png" alt="" class="avatar">
        <h1>Login</h1>
        <form class="user" method="POST" action="" autocomplete="off">
            <p>Username</p>
            <input id="username" type="text" class="form-control form-control-user" id="nombre" name="nombre" placeholder="Usuario...">
            <p>Password</p>
            <input type="password" class="form-control form-control-user" id="contraseña" name="contraseña" placeholder="Password">


            <input value="Login" class="estilosbo" type="submit" class="btn btn-primary btn-user btn-block">
            </input>

            <br><br>
            <?php echo (isset($alert)) ? $alert : ''; ?>

            <a href="/view">Regresar al inicio</a><br>

        </form>
    </div>
</body>

</html>