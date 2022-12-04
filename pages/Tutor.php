<?php

    session_start();
    include('acciones/conec.php');
    $cod = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
    $nombre = $_SESSION['nombre'];
    $matricula = $_SESSION['matricula'];
    $rolUsuario = $_SESSION['rolUsuario'];
    if($cod == null || $cod == '' || $rolUsuario != 3) {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.php');
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/img/favicon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.8">
    <title>Alumnos</title>
</head>

<body>
    <!--Navbar-->
    <header class="header">
        <nav class="nav">
            <a href="../index.php" class="logo nav-link"><img src="../assets/img/logofinish.png"></a>
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
                WHERE tipo_servicio.fk_cod_tutor = $cod";
                $resultado2 = mysqli_query($conexion, $consulta2);

                while($fila2=mysqli_fetch_array($resultado2)){
                    /* $imagen =$fila["imagen"]; */
                    $nomServicio = $fila2["nom_servicio"];
                    $desc = $fila2["descripcion"];
                    
                    echo "<div class='col-sm-4 col-lg-4 col-md-4'>
                            <div class='card' style='width: 100%; height: 100%;'>
                                <img src='../assets/img/hero.jpg' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$nomServicio</h5>
                                    <p class='card-text'>$desc</p>
                                    <a target='_self' href='servicio.php?idServicio=<?$cod' name='id' class='btn btn-primary'>Saber mas</a>
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
                            <div class='card' style='width: 100%; height: 100%;'>
                                <img src='../assets/img/hero.jpg' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$nomServicio</h5>
                                    <p class='card-text'>$desc</p>
                                    <a target='_self' href='servicio.php?idServicio=<?$cod' name='id' class='btn btn-primary'>Saber mas</a>
                                    <a target='_self' href='acciones/agregarServicio.php?idServicio=<?$cod' name='id' class='btn btn-primary'>Agregar</a> 
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
</body>

</html>