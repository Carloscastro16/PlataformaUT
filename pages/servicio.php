<?php

    session_start();
    include('acciones/conec.php');
    $cod = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
    $nombre = $_SESSION['nombre'];
    $matricula = $_SESSION['matricula'];
    $rolUsuario = $_SESSION['rolUsuario'];
    if($cod == null || $cod == '' ) {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.php');
        die();
    }
    $codServicio = $_GET['idServicio'];
    $consulta1= "SELECT * FROM tipo_servicio WHERE cod_servicio = '$codServicio'";
    $resultado = mysqli_query($conexion, $consulta1);
    $fila = mysqli_fetch_array($resultado);
    
    $nombre = $fila['nom_servicio'];
    $tipo = $fila['tipo_servicio'];
    $descripcion = $fila['descripcion'];
    $img = $fila['img'];

    switch($rolUsuario){
        case 1: 
            $linkPerfil = "Administrador.php";
            break;
        case 2: 
            $linkPerfil = "Asesor.php";
            break;
        case 3: 
            $linkPerfil = "Tutor.php";
            break;
        case 4: 
            $linkPerfil = "Alumno.php";
            break;
        default: 
            $linkPerfil = "../index.php";
            break;
    }
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
    <link rel="stylesheet" href="../assets/css/style.css?v=2.1">
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
                <li class="nav-menu-item"><a href="<?php echo $linkPerfil?>" class="nav-menu-link nav-link">Perfil</a></li>
                <li class="nav-menu-item"><a href="acciones/Log-out.php" class="nav-menu-link nav-link">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
    <section class="Portada">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img class="perfil" src="../assets/img/<?php echo $img?>" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="titulos">
                    <?php
                        echo "
                        <h1>$nombre</h1>
                        <p>$tipo</p>
                        ";
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container General">
        <div class="row">
            <div class="col-sm-12">
                <p>
                    <?php echo "$descripcion";?>
                </p>

                <p class="mt-4">Agenda aqui</p>
                <form action="acciones/agregarServicio.php" method="POST">
                    <select name="fecha" id="" class="form-control" name="fecha">
                        <option value="Elige un dia" Selected>Elige un dia</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                    </select>
                    <select name="hora" id="" class="form-control" name="hora">
                        <option value="Elige una hora" Selected>Elige una hora</option>
                        <option value="11:40">11:40</option>
                        <option value="12:50">12:50</option>
                        <option value="1:40">1:40</option>
                        <option value="2:30">2:30</option>
                    </select>
                    <input type="hidden" value="<?php echo $cod ?>" name="codUsuario">
                    <input type="hidden" value="<?php echo $codServicio ?>" name="codServicio">
                    <input type="hidden" value="<?php echo $rolUsuario ?>" name="rolUsr">
                    <input type="submit" class="btn btn-primary mt-4" value="Agendar">
                </form>
            </div>
        </div>
    </section>
    <footer class="servicios">
        <div class="container-foo">
            
            <p>©Todos los derechos reservados 2022</p>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>