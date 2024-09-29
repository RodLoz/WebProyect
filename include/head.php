
<?php
error_reporting(0);
require '../model/config.php';
/* session_destroy(); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Products</title>

    <!-- Ícono de la página -->
    <link rel="shortcut icon" href="../icon/favicon-32x32.png">

    <!-- Estilo de contenido css - index -->
    
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/encabezado.css">
    <link rel="stylesheet" href="../css/pie-pagina.css">
    <link rel="stylesheet" href="../css/compraRealizada.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css-bootstrap/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>

    <script src="https://kit.fontawesome.com/40609dfaaa.js" crossorigin="anonymous"></script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <!-- Script js -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <style type="text/css"> 
        ul, ol{
            list-style: none;
            z-index: 50;
        }

        ul, ol, a{
            text-decoration: none;
        }

        li .listaA{
            color: white;
            margin-top: 10px;
        }

        li .listaA:hover{
            color: white;            
        }
        

        li a:hover{
            color: black;
        }

        .listaCliente1 li ul{
            display: none;
            position: absolute;                     
        }
        

        .listaCliente1 li:hover > ul{
            display:block;
        }

        
    </style>

</head>

<body>

    <!-- ENCABEZADO -->
    <header>
        <div class="container-top">
            <a href="#" class="img-top"><img src="../img/bannerpromo.png"></a>
        </div>        
    </header>

    <!-- MENU 1-->
    <nav>         
        <div class="objetos">  
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>            
            <!-- Lista para menu en barra -->
            <ul id="lista-desplegable" class="lista-desplegable">
                <li class="lista-desplegable__item">
                    <a href="index.php" class="lista-desplegable__link">Inicio</a>
                </li>
                <li class="lista-desplegable__item">
                    <a href="../view/producto_laptop.php" class="lista-desplegable__link">Laptops</a>
                </li>
                <li class="lista-desplegable__item">
                    <a href="../view/producto_celulares.php" class="lista-desplegable__link">Celulares</a>
                </li>
                <li class="lista-desplegable__item">
                    <a href="../view/producto_audifono.php" class="lista-desplegable__link">Audífonos</a>
                </li>
                <li class="lista-desplegable__item">
                    <a href="../view/localizador-tienda.php" class="lista-desplegable__link">Ubicación</a>
                </li>
                <li class="lista-desplegable__item">
                    <a href="../view/listaCarrito.php" class="lista-desplegable__link">Mi carrito</a>
                </li>
                <li class="lista-desplegable__item">
                    <a href="../view/login.php" class="lista-desplegable__link">Iniciar Sesión</a>
                </li>
            </ul>

            <a href="./index.php" class="img-logo"><img src="../img/logo-png.png" class="img-fluid" width="100px"></a>    
            <a class="nav-link dropdown-toggle cat-dis" href="#" role="button" data-bs-toggle="dropdown">
                            Productos
                        </a>
                        <ul class="dropdown-menu">

                        <?php
                    $query = mysqli_query($conexion, "SELECT * FROM categorias ORDER BY codigo DESC");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td>
                                </form>
                            </td>
                        </tr>
               
                    
                            <li><a class="dropdown-item" href="producto_<?php echo $data['categoria']; ?>.php"><?php echo $data['categoria']; ?></a></li>
    

                            <?php } ?>

                        </ul>
            <form class="busqueda" role="search" action="../view/buscarProd.php" method="POST">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input class="busqueda" name="buscarProdu" type="search" placeholder="Buscar..." aria-label="Search"> 
                <!-- <input type="text" name="search">
                <input type="submit" name="submit"> -->                
            </form>

            
                <div class="locacion1">
                    <a href="../view/localizador-tienda.php"><i class="fa-solid fa-location-dot"></i>Ubicación</a> 
                            
                </div>
                <div class="carrito1">
                    <a href="../view/listaCarrito.php"><i class="fa-solid fa-cart-shopping"></i>Carrito</a>
                    <span id="num_cart" class="badge bg-secondary carritSpan"><?php echo $num_cart; ?></span>
                </div>


                <?php                     
                    if($_SESSION['usuario']!=null){
                ?>

        <div class="listaCliente1">
                                    <ul style="padding-top: 15px;">
                                        <li><a class="listaA" href="./index.php" class="cuadro-login"><?php echo $_SESSION['usuario'] ?></a>

                                            

                                                <ul style="background-color: black; border-radius: 10px;">
                                                    <li style="padding-top: 15px; "><a  style="text-decoration: none; color: white;" href="./comprasRealizadas.php">Compras</a></li>
                                                    <li style="padding-top: 15px;"><a href="../model/cerrar_sesion.php" style="text-decoration: none; color: white;">Cerrar Sesión</a></li>
                                                </ul>

                                            

                                        </li>
                                    </ul>
                                </div>

                <?php 
                    }else{
                ?>
                    <div class="usuario1">
                    <a href="../view/login.php"><i class="fa-solid fa-user"></i >Inicia Sesión</a>
                    </div>
                <?php
                    }
                ?>
            
            <!-- <a class="location-dot" href="./localizador-tienda.php"><img src="../img/tienda-logo.png" alt=""></i></a> -->            
            <!-- <a class="carrito-dot" href="#"><img src="../img/carrito-logo.png" alt=""></i></a> -->                     
            <!-- <a class="iniciar-dot" href="./login.php"><img src="../img/inicio-logo.png" alt=""></i></a> -->
        </div>
    </nav>