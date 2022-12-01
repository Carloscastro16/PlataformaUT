
<?php

session_start();
include('acciones/conec.php');
$cod = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
    $nombre = $_SESSION['nombre'];
    $matricula = $_SESSION['matricula'];
    $rolUsuario = $_SESSION['rolUsuario'];
if($cod == null || $cod == '' || $rolUsuario != 2) {
    echo "ERROR: 412 Usted no tiene acceso";
    header('Location: ../index.html');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../assets/js/index.js"></script>
    <title>Asesor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/img/favicon.svg">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/normalize.css?v=1.2">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.2">
</head>

<body class="Asesor">

<main>
    <div class="d-flex" id="wrapper">
        <!--Sliderbar-->
        <div class="bg-dark centradoHorizontal" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <img src="../assets/img/logofinish.jpg" alt="">
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="Asesor.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    Dashboard
                </a>
                <a  href="edicionServicios.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    Edicion de servicios
                </a>
                <a href="acciones/Log-out.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    Logout
                </a>
            </div>
        </div>
        <!-- End Sliderbar-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg  bg-dark py-3 px-4">
                <div class="d-flex aling-items-center">
                    <i class="fas fa-aling-left primary-text fs-4 me-4" id="menu-toggle"></i>
                    <h2 class="navbarNav">Dashboard</h2>
                </div>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSypportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                        <li class='nav-item-dropdown'>
                            <a href='#' class='nav-link dropdown-toggle second-text fw-bold' id='navbarDropdown'
                                role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                Hola, <?php echo $nombre ?>!
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <li class='dropdown-link'>
                                    <a href='../index.html'>Home</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='Asesor.php'>Dashboard</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='acciones/Log-out.php'>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="General">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Perfil
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="imaperfil">
                                <img src="../Images/fotoPrincipal.png" alt=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="titulito">
                                <h4>
                                    <?php
                                        echo $nombre;
                                    ?>!
                                </h4> 
                                <h4>Correo:
                                    <?php
                                        echo $correo;
                                    ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Paquetes
                                </h4>
                            </div>
                        </div>
                        <?php
                            include('acciones/conec.php');
                            $consulta3 = "SELECT * FROM tipo_servicio LIMIT 6";
                            $resultado3 = mysqli_query($conexion, $consulta3);

                            while($fila3=mysqli_fetch_array($resultado3)){
                                /* $imagen =$fila["imagen"]; */
                                $nomServicio = $fila3["nom_servicio"];
                                $desc = $fila3["descripcion"];
                                
                                echo "<div class='col-sm-3 col-lg-3 col-md-3'>
                                        <div class='card d-flex .justify-content-between' style='width: 100%; height: 100%;'>
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
        </div>
    </div>
</main>

<!-------- Scripts -------->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>