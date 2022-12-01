<?php

    session_start();
    include('acciones/conec.php');
    $cod = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
    $nombre = $_SESSION['nombre'];
    $matricula = $_SESSION['matricula'];
    $rolUsuario = $_SESSION['rolUsuario'];
    if($cod == null || $cod == '' || $rolUsuario != 4) {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.html');
        die();
    }
    $consulta1= "SELECT * FROM usuario WHERE matricula = '$matricula'";
    $resultado = mysqli_query($conexion, $consulta1);
    $fila= mysqli_fetch_array($resultado);

    $rol = $fila['fk_rol_usuario'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/normalize.css?v=1.2">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../assets/js/index.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.6">
    <title>Alumnos</title>
</head>

<body>
    <!--Navbar-->
    <header class="header">
        <nav class="nav">
            <a href="index.html" class="logo nav-link"><img src="../assets/img/logofinish.png"></a>
            <button class="nav-toggle" aria-label="abrir menu">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu">
                <li class="nav-menu-item"><a href="http://www.utcancun.edu.mx/" class="nav-menu-link nav-link">Pagina UT</a></li>
                <li class="nav-menu-item"><a href="acciones/Log-out.php" class="nav-menu-link nav-link">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
    <section class="Portada">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img class="perfil" src="../assets/img/senora.jpg" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="titulos">
                    <?php
                        echo "
                        <h1>$nombre</h1>
                        <p>$matricula</p>
                        ";
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contenidos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-5 mb-3 d-flex justify-content-start">
                    <h2>Agendado</h2>
                </div>
                <?php
                include('acciones/conec.php');
                $consulta2 = "SELECT tipo_servicio.descripcion, tipo_servicio.nom_servicio FROM tutoria 
                INNER JOIN tipo_servicio ON tipo_servicio.cod_servicio = tutoria.fk_cod_servicio
                WHERE tutoria.fk_cod_alumno = $cod";
                $resultado2 = mysqli_query($conexion, $consulta2);

                while($fila2=mysqli_fetch_array($resultado2)){
                    /* $imagen =$fila["imagen"]; */
                    $nomServicio = $fila2["nom_servicio"];
                    $desc = $fila2["descripcion"];
                    
                    echo "<div class='col-sm-4 col-lg-4 col-md-4'>
                            <div class='card' style='width: 18rem;'>
                                <img src='../assets/img/hero.jpg' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$nomServicio</h5>
                                    <p class='card-text'>$desc</p>
                                    <a href='#' class='btn btn-primary'> Go somewhere</a>
                                </div>
                            </div>
                        </div>";
                };
                ?>
                
                <div class="w-100"></div>

                <div class="col-sm-12 mt-5 mb-3">
                    <h2>Tutorias disponibles</h2>
                </div>
                <?php
                include('acciones/conec.php');
                $consulta3 = "SELECT * FROM tipo_servicio";
                $resultado3 = mysqli_query($conexion, $consulta3);

                while($fila3=mysqli_fetch_array($resultado3)){
                    /* $imagen =$fila["imagen"]; */
                    $nomServicio = $fila3["nom_servicio"];
                    $desc = $fila3["descripcion"];
                    
                    echo "<div class='col-sm-4 col-lg-4 col-md-4'>
                            <div class='card' style='width: 18rem;'>
                                <img src='../assets/img/hero.jpg' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$nomServicio</h5>
                                    <p class='card-text'>$desc</p>
                                    <a href='#' class='btn btn-primary'> Go somewhere</a>
                                </div>
                            </div>
                        </div>";
                };
                ?>
            </div>
        </div>

    </section>
    <footer>
        <div class="container-foo">
            
            <p>©Todos los derechos reservados 2022</p>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>