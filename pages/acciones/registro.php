<?php
include('conec.php');

$correo= $_POST['correo'];
$pass= $_POST['password'];
$nomUser= $_POST['nombre'];
$apellPa= $_POST['apellPa'];
$apellMa= $_POST['apellMa'];
$matricula= $_POST['matricula'];
    $encryptPass = password_hash($pass, PASSWORD_DEFAULT);
    
    //consulta mysql//
    //mensaje si no se ingresa valores//
    
    $consultaEmail = "SELECT COUNT(*) as contador FROM usuario WHERE correo_usuario = '$correo'";
    $validacion = mysqli_query($conexion, $consultaEmail);
    $validacionEmail = mysqli_fetch_array($validacion);

    if($validacionEmail['contador'] != 0){
        echo "<script type='text/javascript'> alert('El correo ya existe en la base de datos');
        window.location('../log-in.html');
        </script>";
    }else {
        $insertarUsuario= "INSERT INTO usuario(fk_rol_usuario, nombre_usuario,ape_paterno, ape_materno, correo_usuario, contra_usuario, matricula) 
        value (4,'$nomUser','$apellPa','$apellMa','$correo','$encryptPass', '$matricula')";
        $resultados=mysqli_query($conexion,$insertarUsuario);
        header ('location: ../Paginas/LogIn.php');
    }
    //redireccionamiento//
?>