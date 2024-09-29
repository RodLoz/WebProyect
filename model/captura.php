<?php

/* require '../config/database.php';
require '../model/config.php'; */


$db = new  Database();
$con = $db->conectar();

/* $json = file_get_contents('php://input');
$datos = json_decode($json, true);



print_r($datos); */


        if(isset($_POST['realizarPago'])){

            $fechaActual = date('d/m/y h:i:s');

            $id_transaccion = "5GW34015LT6064641";
            $totalF = $total;
            $status = "PAGADO";
            $fecha = $fechaActual;            
            $email = $_SESSION['usuario'];
            $id_cliente = $_SESSION['idCliente'];

            $sql = $con -> prepare("INSERT INTO mibase1.compra (id_transaccion, fecha, status, correo, id_cliente, total) VALUES
            (?,?,?,?,?,?)");

            $sql -> execute([$id_transaccion, $fecha, $status, $email, $id_cliente, $total]);
            $id = $con -> lastInsertId(); 

            if($id > 0){

                $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

                if($productos != null){
                    foreach($productos as $clave => $cantidad){
                        $sqlConsulta = $con->prepare("SELECT codigo, nombre, precio_normal FROM mibase1.productos WHERE codigo=?");
                        $sqlConsulta -> execute([$clave]);
                        $row_prod = $sqlConsulta->fetch(PDO::FETCH_ASSOC);

                        $precio = $row_prod['precio_normal'];                
                        
                        $sql_insert = $con->prepare("INSERT INTO mibase1.detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES
                        (?,?,?,?,?)");

                        $sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio, $cantidad]);

                    }
                }

                unset($_SESSION['carrito']);
                echo '<script type="text/javascript">
                alert("Pedido realizado..."); 
                window.location.href="../view/index.php";           
                </script>';              
                

            }    
        }

?>