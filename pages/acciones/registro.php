<?php
include('conec.php');
$agregar = $_POST['agregar'];

    $matricula= $_POST['matricula'];
    $correo= $_POST['correo'];
    $pass= $_POST['password'];
    $nomUser= $_POST['nombre'];
    $apellPa= $_POST['apellPa'];
    $apellMa= $_POST['apellMa'];
    $encryptPass = password_hash($pass, PASSWORD_DEFAULT);
    
    //consulta mysql//
    //mensaje si no se ingresa valores//
    
    $consultaEmail = "SELECT COUNT(*) as contador FROM usuario WHERE correo_usuario = '$correo'";
    $validacion = mysqli_query($conexion, $consultaEmail);
    $validacionEmail = mysqli_fetch_array($validacion);

    if($validacionEmail['contador'] == 0){
        $insertarUsuario= "INSERT INTO usuario() 
        value ('$nomUser','$apellPa','$apellMa','$correo','$encryptPass')";
        $resultados=mysqli_query($conexion,$insertarUsuario);
        header ('location: ../Paginas/LogIn.php');
        if(empty($rfc)){
        }else{
            $insertarUsuario = "INSERT INTO usuario(fk_rol_usuario, nombre_usuario ,ape_paterno ,ape_materno , correo_usuario, nombre_empresa, contra_usuario, tel_empresa, rfc) 
            VALUE (3,'$nomUser','$apellPa','$apellMa','$correo','$nombreEmpresa','$encryptPass',$telefono,'$rfc')";
            $resultados=mysqli_query($conexion,$insertarUsuario);
            header ('location: ../Paginas/LogIn.php');
        }
    }else {
        
        header ('location: ../Paginas/LogIn.php');
        echo "<script type='text/javascript'> alert('El correo ya existe en la base de datos');</script>";
    }
    //redireccionamiento//
?>