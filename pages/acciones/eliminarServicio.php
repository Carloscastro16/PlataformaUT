<?php
include('../Acciones/conec.php');

$codServ=$_GET['idServicio'];
$eliminarOrdenes = "DELETE FROM tipo_servicio WHERE cod_servicio = $codServ";

$eliminar=mysqli_query($conexion,$eliminarOrdenes);
header('Location: ../edicionServicios');
?>