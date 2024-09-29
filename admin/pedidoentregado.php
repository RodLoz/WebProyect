<?php


require_once "config/conexion.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>DELUX-PRODUCT | Admin</title>

    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <div id="wrapper">
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href=""
        >
          <div class="sidebar-brand-text mx-3">
            DELUXE PRODUCTS <sup>Administrador</sup>
          </div>
        </a>

        <hr class="sidebar-divider my-0" />

        <hr class="sidebar-divider" />

        <li class="nav-item">
          <a class="nav-link" href="pedidopendiente.php">
            <i class="fa fa-envelope-open"></i>
            <span>Pedidos pendientes</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="pedidoentregado.php">
            <i class="fas fa-tag"></i>
            <span>Pedidos entregados</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="categorias.php">
            <i class="fas fa-list"></i>
            <span>Categorias</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos.php">
            <i class="fa fa-database"></i>
            <span>Productos</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="administarusuarios.php">
            <i class="fa fa-cog fa-fw"></i>
            <span>Administar usurios</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="empleados.php">
            <i class="fa fa-address-book"></i>
            <span>Agregar Empleado </span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="salir.php">
            <i class="fa fa-window-close"></i>
            <span>Cerrar Sesion</span></a
          >
        </li>

        <hr class="sidebar-divider d-none d-md-block" />
      </ul>

      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <img
                    class="img-profile rounded-circle"
                    src="assets/img/admin.png"
                  />
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="salir.php">
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Salir
                  </a>
                </div>
              </li>
            </ul>
          </nav>

          <div class="container-fluid">
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800">Pedido hoy</h1>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table
                    class="table table-hover table-bordered"
                    style="width: 100%"
                  >
                    <thead class="thead-dark">
                      <tr>
                      <th>ID</th>
                        <th>ID_Transacción</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th>Correo</th>
                        <th>id_cliente</th>
                        <th>Total S/. </th>                        
                        <th>Acción</th>  
                      </tr>
                    </thead>
                    <tbody>

                    <?php $query = mysqli_query($conexion, "SELECT * FROM compra WHERE compra.status='ENTREGADO'");
                    while ($data = mysqli_fetch_assoc($query)) { ?>


                      <tr>
                      <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['id_transaccion']; ?></td>
                            <td><?php echo $data['fecha']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td><?php echo $data['correo']; ?></td>
                            <td><?php echo $data['id_cliente']; ?></td>
                            <td><?php echo $data['total']; ?></td>

                      <?php } ?>

                        <td>
                          <form
                            method="post"
                            action="eliminar.php?accion=pro&amp;id=18"
                            class="d-inline eliminar"
                          >
                            <button class="btn btn-inspect" type="submit">
                              Inspeccionar
                            </button>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div
              id="productos"
              class="modal fade"
              tabindex="-1"
              role="dialog"
              aria-labelledby="my-modal-title"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="title">Nuevo Producto</h5>
                    <button
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form
                      action=""
                      method="POST"
                      enctype="multipart/form-data"
                      autocomplete="off"
                    >
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input
                              id="nombre"
                              class="form-control"
                              type="text"
                              name="nombre"
                              placeholder="Nombre"
                              required=""
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input
                              id="cantidad"
                              class="form-control"
                              type="text"
                              name="cantidad"
                              placeholder="Cantidad"
                              required=""
                            />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea
                              id="descripcion"
                              class="form-control"
                              name="descripcion"
                              placeholder="Descripción"
                              rows="3"
                              required=""
                            ></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="p_normal">Precio Normal</label>
                            <input
                              id="p_normal"
                              class="form-control"
                              type="text"
                              name="p_normal"
                              placeholder="Precio Normal"
                              required=""
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="p_rebajado">Precio Rebajado</label>
                            <input
                              id="p_rebajado"
                              class="form-control"
                              type="text"
                              name="p_rebajado"
                              placeholder="Precio Rebajado"
                              required=""
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select
                              id="categoria"
                              class="form-control"
                              name="categoria"
                              required=""
                            >
                              <option value="1">Instalaciones</option>
                              <option value="3">Revisión</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="imagen">Foto</label>
                            <input
                              type="file"
                              class="form-control"
                              name="foto"
                              required=""
                            />
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">
                        Registrar
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span
                >DELUX-PRODUCT - 2022 | PÁGINA DESARROLLADO POR EL GRUPO 7
              </span>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>
