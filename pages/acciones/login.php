<?php
include ('conec.php');
    $email = $_POST['correo'];
    $pass = $_POST['password'];  
    $consultaEmail = "SELECT COUNT(*) as contador FROM db_tutorias.usuario WHERE correo_usuario = '$email'";
    $validacion = mysqli_query($conexion, $consultaEmail);
    $validacionEmail = mysqli_fetch_array($validacion);

    $consulta = "SELECT * FROM db_tutorias.usuario WHERE correo_usuario LIKE '$email'";
    /* Colsulta para guardar el registro en una tabla */
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    
    
    //Confirma que se hizo algo nadamas
    $respuesta = '';
    
    
    if($validacionEmail['contador'] != 0){
        //password_hash sirve para verificar la contraseña
        $encryptPass = password_verify($pass, $fila["contra_usuario"]);
        if ($encryptPass){
            $rolUsuario = $fila["fk_rol_usuario"];
            $idUsuario = $fila["cod_usuario"];
            $nombre_usuario = $fila["nombre_usuario"];
            session_start();
            $_SESSION['cod_usuario']= $idUsuario;
            $_SESSION['correo']= $email;
            $_SESSION['rolUsuario'] = $rolUsuario;
            $_SESSION['nombre'] = $nombre_usuario;
            $_SESSION['matricula'] = $fila["matricula"];
            $respuesta = 1;
            echo $respuesta;
        } else {
            $respuesta = "La contraseña es incorrecta";
            echo "<script>alert('Contraseña Incorrecta');
            window.location.href = '../Log-in.html';
            </script>";
        }
    }else{
        $respuesta = "No existe tu perfil";
        echo "<script>alert('$respuesta');
        window.location.href = '../Log-in.html';</script>";
    }
        if($respuesta==1 && $rolUsuario == 1){
            header('Location: ../Administrador.php');
        }else if ($respuesta==1 && $rolUsuario == 2){
            header('Location: ../Asesor.php');
            
        }else if ($respuesta==1 && $rolUsuario == 3){
            header('Location: ../Tutor.php');
        }else if ($respuesta==1 && $rolUsuario == 4){
            header('Location: ../Alumno.php');
        }else{
            /* header('Location: ../Paginas/LogIn.php'); */
            echo "<script>window.location.href = '../Log-in.html';</script>";
        }
?>