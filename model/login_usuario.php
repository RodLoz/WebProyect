<?php

        include './conexion.php';

        

         if(!isset($_SESSION)){
            session_start();
        }
        
        

    if(isset($_POST['entrar'])){

        
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        /* Administrador */
        if($correo=="Pepeluxe@gmail.com" && $contraseña=="12345"){
            $_SESSION['usuario']="Pepe";
            echo '<script type="text/javascript">
            alert("Ingreso de datos exitoso. Iniciando sesión como administrador..."); 
            window.location.href="admin-panel.php";           
            </script>';              
            exit();
        }

        if(!empty($correo) && !empty($contraseña)){

            $validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo'and contraseña='$contraseña'");
        
            $mysqli = new mysqli("localhost","root","","mibase1");

            $consulta = "SELECT * FROM usuario WHERE correo='$correo'and contraseña='$contraseña'";            

            //$resultado1 = $mysqli->query($consulta);

            if($result = $mysqli->query($consulta)){                

                while($obj = $result->fetch_object()){
                    $idCliente1 = $obj->codigo;
                }

                $result->close();
            }
            

            if(mysqli_num_rows($validar_login) > 0){
                $_SESSION['idCliente'] = $idCliente1;
                $_SESSION['usuario']=$correo;
                echo '<script type="text/javascript">
                    alert("Ingreso de datos exitoso. Iniciando sesión..."); 
                    window.location.href="./index.php";           
                    </script>';              
                exit();
            }else{
                echo '
                    <div class="error">
                    *Usuario no existe, verifique los datos ingresados                
                    </div>
                ';
                exit();
            }
        }elseif (empty($correo) && empty($contraseña)) {
            echo '<div class="error">*El campo correo no debe estar vacío <br>
            *El campo contraseña no debe estar vacío</div>';
        }elseif (empty($correo) || strpos($email, "@")) {
            echo '<div class="error">*Ingrese un correo válido</div>';
        }elseif (empty($correo) || strpos($email, "@")) {
            echo '<div class="error">*Ingrese un correo válido</div>';
        }elseif (empty($contraseña)) {
            echo '<div class="error">*El campo contraseña no debe estar vacío</div>';
        }
    }
    

?>