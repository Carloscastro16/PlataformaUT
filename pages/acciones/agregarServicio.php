<?php
include('conec.php');

$codServ=$_POST['codServicio'];
$codAlumno=$_POST['codUsuario'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$rol = $_POST['rolUsr'];
$addServicio = "INSERT INTO tutoria(fk_cod_alumno, fk_cod_servicio, fecha, hora_evento) VALUES
('$codAlumno', '$codServ', '$fecha', '$hora');";

$addServConf=mysqli_query($conexion,$addServicio);

switch($rol){
    case 1:
        header('Location: ../Administrador.php');
        break;
    case 2: 
        header('Location: ../Asesor.php');
        break;
    case 3: 
        header('Location: ../tutor.php');
        break;
    case 4: 
        header('Location: ../Alumno.php');
        break;
}
?>