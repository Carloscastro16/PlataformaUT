<?php
include ('conec.php');
    $email = $_POST['correo'];
    $pass = $_POST['password'];  
    $consulta = "SELECT * FROM usuario WHERE correo_usuario LIKE '$email'";

    /* Colsulta para guardar el registro en una tabla */
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    $rolUsuario = $fila["fk_rol_usuario"];
    $idUsuario = $fila["cod_usuario"];
    $nombre_usuario = $fila["nombre_usuario"];
    
    //Confirma que se hizo algo nadamas
    $respuesta = '';
    
    //password_hash sirve para verificar la contraseña
    $encryptPass = password_verify($pass, $fila["contra_usuario"]);

    if(count($fila) > 0){
        
        if ($encryptPass){
            session_start();
            $_SESSION['cod_usuario']= $idUsuario;
            $_SESSION['correo']= $email;
            $_SESSION['rolUsuario'] = $rolUsuario;
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            $respuesta = 1;
            echo $respuesta;
        } else {
            $respuesta = "La contraseña es incorrecta";
            echo "<script>alert('Contraseña Incorrecta');
            window.location.reload();
            </script>";
        }
    }else{
        $respuesta = "No existe tu perfil";
        echo "<script>alert('$respuesta');</script>";
    }
        if($respuesta==1 && $rolUsuario == 1){
            header('Location: ../Paginas/Administrador.php');
        }else if ($respuesta==1 && $rolUsuario == 2){
            header('Location: ../Paginas/Asesor.php');
            
        }else if ($respuesta==1 && $rolUsuario == 3){
            header('Location: ../Paginas/Alumno.php');
        }else if ($respuesta==1 && $rolUsuario == 4){
            header('Location: ../Paginas/tutor.php');
        }else{
            /* header('Location: ../Paginas/LogIn.php'); */
            echo "<script>window.location.href = '../Paginas/LogIn.php';</script>";
        }
?>