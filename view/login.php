<?php

/* error_reporting(0); */

include("./conexion.php");
if (!session_start()) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
}

?>
<?php include("../include/head.php"); ?>

<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/encabezado.css">
<link rel="stylesheet" href="../css/pie-pagina.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css-bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<script src="https://kit.fontawesome.com/40609dfaaa.js" crossorigin="anonymous"></script>



<div class="contenedor__todo">
    <div class="caja__trasera">
        <div class="caja__trasera-login">
            <h3>¿Ya tienes una cuenta?</h3>
            <p>Inicia sesión para entrar en la página</p>
            <button id="btn__iniciar-sesion">Iniciar Sesión</button>
        </div>
        <div class="caja__trasera-register">
            <h3>¿Aún no tienes una cuenta?</h3>
            <p>Regístrate para que puedas iniciar sesión</p>
            <button id="btn__registrarse">Regístrarse</button>
        </div>
    </div>

    <!--Formulario de Login y registro-->
    <div class="contenedor__login-register">
        <!--Login-->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario__login">
            <h2>Iniciar Sesión</h2>
            <input type="email" placeholder="Correo Electronico" name="correo">
            <input type="password" placeholder="Contraseña" name="contraseña">
            <button name="entrar">Entrar</button><br><br>

            <?php
            require('../model/login_usuario.php');
            ?>

        </form>

        <!--Register-->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario__register">
            <h2>Registrarse</h2>
            <input type="text" placeholder="Nombre " name="nombre">
            <input type="text" placeholder="Apellido " name="apellido">
            <input type="email" placeholder="Correo Electronico" name="correo">
            <input type="password" placeholder="Contraseña" name="contraseña">
            <input type="text" placeholder="Celular " name="celular">
            <input type="text" placeholder="Direccion " name="direccion">
            <button name="registrar">Registrarse</button> <br><br>

            <?php
            require('../model/registro_usuario.php');
            ?>

        </form>
    </div>
</div>

<?php include("../include/footer.php"); ?>