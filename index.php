<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/img/favicon.svg">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/normalize.css?v=1.2">
    <link rel="stylesheet" href="assets/css/style.css?v=1.6">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="assets/js/index.js"></script>
    <title>Asesorias</title>
</head>

<body>
    <!--Navbar-->
    <header class="header">
        <nav class="nav">
            <a href="index.html" class="logo nav-link"><img src="assets/img/logofinish.png"></a>
            <button class="nav-toggle" aria-label="abrir menu">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu">
                <li class="nav-menu-item"><a href="#" class="nav-menu-link nav-link active">Home</a></li>
                <li class="nav-menu-item"><a href="http://www.utcancun.edu.mx/" class="nav-menu-link nav-link">Pagina UT</a></li>
                <li class="nav-menu-item"><a href="pages/curso-bd.html" class="nav-menu-link nav-link">Cursos</a></li>
                <li class="nav-menu-item"><a href="pages/curso-ds.html" class="nav-menu-link nav-link">Tutorias</a></li>
                <li class="nav-menu-item"><a href="pages/log-in.html" class="nav-menu-link nav-link">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>
    <section id="hero">
        <div class="contenido-hero">
        <h1>Conoce el plan de asesorias <br>diseñado para ti</h1>
    </div>
    </section>
    <hr>
    <section id="nuestros-cursos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Nuestros cursos</h2>
                </div>
                <?php
                include('pages/acciones/conec.php');
                $consulta3 = "SELECT * FROM tipo_servicio";
                $resultado3 = mysqli_query($conexion, $consulta3);

                while($fila3=mysqli_fetch_array($resultado3)){
                    /* $imagen =$fila["imagen"]; */
                    $cod = $fila3['cod_servicio'];
                    $nomServicio = $fila3["nom_servicio"];
                    $desc = $fila3["descripcion"];
                    $img = $fila3["img"];
                    
                    echo "<div class='col-sm-4 col-lg-4 col-md-4'>
                            <div class='card' style='width: 18rem;'>
                                <img src='assets/img/$img' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$nomServicio</h5>
                                    <p class='card-text'>$desc</p>
                                </div>
                            </div>
                        </div>";
                };
                ?>
            </div>
            </div>
        </div>
    </section>
    <section id="orgullo">
        <div class="container">
            <div class="img-container">
                <img src="assets/img/hero.jpg" alt="">
            </div>
            <div class="texto">
                <h2>Somos Orgullo UT</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores corporis exercitationem laudantium
                dolorem optio, cum quidem beatae quam quaerat ipsam minima labore in praesentium, neque quasi error
                illum voluptas ducimus!</p>
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