<?php
require_once "config/conexion.php";

if (isset($_POST)) {
    if (!empty($_POST)) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $celular = $_POST['celular'];
        $direccion = $_POST['direccion'];

        $query = mysqli_query($conexion, "INSERT INTO usuario(codigo, nombre, apellido, correo, contraseña, celular, direccion,) VALUES ('$codigo', '$nombre', '$apellido', '$correo', '$contraseña', '$celular', '$direccion')");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                header('Location: administarusuarios.php');
            }
        }
    }
}
include("include/cabezera.php"); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administrar usuarios</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Numero de Telefono</th>
                        <th>Direccion</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM usuario ORDER BY codigo DESC");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['codigo']; ?></td>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['apellido']; ?></td>
                            <td><?php echo $data['correo']; ?></td>
                            <td>xxxxxxxxxxxx</td>
                            <td><?php echo $data['celular']; ?></td>
                            <td><?php echo $data['direccion']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include("include/footer.php"); ?>