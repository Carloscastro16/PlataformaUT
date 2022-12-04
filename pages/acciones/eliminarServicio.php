<?php
include('conec.php');

$codServ=$_GET['idServicio'];
$eliminarOrdenes = "DELETE FROM tutoria WHERE fk_cod_servicio = $codServ";
$eliminarServicio = "DELETE FROM tipo_servicio WHERE cod_servicio = $codServ";

$eliminarO=mysqli_query($conexion,$eliminarOrdenes);
$eliminarS=mysqli_query($conexion,$eliminarServicio);
header('Location: ../edicionServicios.php');
?>