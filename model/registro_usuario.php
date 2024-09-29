<?php

    include './conexion.php';

    if(isset($_POST['registrar'])){

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $celular = $_POST['celular'];
        $direccion = $_POST['direccion'];
        //encriptamiento de contraseña
        /* $contraseña = hash('sha512', $contraseña); */ /* 512 bits algoritmo hash seguro */

        $campos = array();
        

    

        if(!empty($nombre) && !empty($correo) && !empty($apellido) && !empty($contraseña) && !empty($contraseña) && !empty($celular) && !empty($direccion)){

            $query = "INSERT INTO usuario(nombre, apellido, correo, contraseña, celular, direccion)
                        VALUES('$nombre', '$apellido','$correo', '$contraseña', '$celular', '$direccion')";
        
        //verificar que  el Correo no se repita en la BD
        $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' ");
            
        if(mysqli_num_rows($verificar_correo)>0){
            echo '
                    <script>
                        alert("Este correo ya esta en uso, intente con otro");
                        window.location="./login.php";
                    </script>    
            ';
            exit();
        }



        $ejecutar = mysqli_query($conexion, $query);

            if($ejecutar){
                echo'
                    <script>
                        alert("Usuario registrado exitosamente") ;
                        window.location="./index.php";
                    </script>
                ';
            }else{
                echo'
                <script>
                    alert("vuelve a intentarlo, usuario no registrado") ;
                    window.location="./login.php";
                </script>
            ';
            mysqli_close($conexion);

            }
        }else{
            if($nombre == ""){        
                array_push($campos, "El campo Nombre no puede estar vacío.");
            }
            if($apellido == ""){        
                array_push($campos, "El campo apellido no puede estar vacío.");
            }

            if($correo == "" || strpos($email, "@") === false){ /* 3 iguales para que sea como un valor número el "false" "0" */
                array_push($campos, "Ingresa un correo electrónico válido.");
            }


            if(empty($contraseña)){
                array_push($campos, "El campo contraseña no debe estar vacío.");
            }
            if($celular == ""){        
                array_push($campos, "El campo celular no puede estar vacío.");
            }
            if($direccion == ""){        
                array_push($campos, "El campo direccion no puede estar vacío.");
            }

            if(count($campos) > 0){
                echo "<div class='error'>";
                for($i = 0; $i < count($campos); $i++){
                    echo "<li>".$campos[$i]."</i>";
                }
            }else{
                echo "<div class='correcto'>
                        Datos correctos";                        
            }

            echo "</div>";
        }

            

    }

?>                