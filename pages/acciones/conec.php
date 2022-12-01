<?php
//Datos de la db
$hostname = 'localhost'; // 127.0.0.1
$username = 'root';
$password = '';
$database = 'db_tutorias';
// Query para la conexión a la db
$conexion = mysqli_connect($hostname, $username, $password, $database);

// Validador de conexión de la db
if (mysqli_connect_error()) {
    echo 'Conexión fallida';
} else {
    /* echo 'Conexión exitosa'; */
}
?>