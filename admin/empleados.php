<?php
require_once "config/conexion.php";

if (isset($_POST)) {
    if (!empty($_POST)) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['contraseña'];
        $correo = $_POST['rol'];

        $query = mysqli_query($conexion, "INSERT INTO administrador(codigo, nombre, contraseña, rol) VALUES ('$codigo', '$nombre', '$contraseña', '$rol')");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                header('Location: administarusuarios.php');
            }
        }
    }
}
include("include/cabezera.php"); ?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirCategoria"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>

                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM administrador ORDER BY codigo DESC");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['codigo']; ?></td>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['contraseña']; ?></td>
                            <td><?php echo $data['rol']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>


<div id="categorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="title">Nuevo Empleado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                        <label for="nombre">Codigo</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Codigo" required>
                        <label for="nombre">Contraseña(Encriptado)</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Contraseña" required>
                        <label for="nombre">Rol</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Rol" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>

                </form>
            </div>
        </div>
        <?php include("include/footer.php"); ?>