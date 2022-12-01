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
    <title>Servicios</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/img/favicon.svg">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/normalize.css?v=1.2">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.4">
</head>

<body class="Asesor">
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

            <!-- Seccion interior de la pagina -->
            <section class="altaServicio General">
                <div class="container">
                    <form action="acciones/registroServicio.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="imaperfil input-group">
                                    <div class="custom-file">
                                        <label class="form-title" for="">Sube una imagen</label>
                                        <!--<img src="../Images/imagenPaquete.jpg" alt="" />v -->
                                        <input type="file" accept="image/*"  name="txtnom" class="custom-file-input form-control" aria-describedby="inputGroupFileAddon01"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-title" for="">Nombre del Servicio</label>
                                <input class="form-control" type="text" name="nombreServicio" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label class="form-title" for="">Tipo de servicio</label>
                                <select class="form-select" aria-label="Default select example" name="tipoServicio">
                                    <option selected>Ingrese el servicio</option>
                                    <option value="tutoria">Tutoria</option>
                                    <option value="taller">Taller</option>
                                    <option value="Curso">Curso</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Tutor del servicio</label>
                                <select class="form-select" aria-label="Default select example" name="tutor">
                                    <option selected>Ingrese el tutor</option>
                                    <?php
                                        include('acciones/conec.php');
                                        $consulta='SELECT nombre_usuario, cod_usuario FROM usuario WHERE fk_rol_usuario = 3';
                                        $resultado= mysqli_query($conexion,$consulta); 
                                        WHILE($fila=mysqli_fetch_array($resultado)){
                                    ?>
                                    <option value="<?php echo $fila['cod_usuario'] ?>"> <?php echo $fila['nombre_usuario']?>
                                    </option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Disponibilidad</label>
                                <select class="form-select" aria-label="Default select example" name="dispon">
                                    <option selected>Ingrese disponibilidad</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="Ocupado">No disponible</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-title" for="">Descripcion</label>
                                <textarea name="descripcion" class="form-control" id="" rows="3"></textarea>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="btnAgregar" value="Añadir paquete" class="btn btn-primary">
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="General mt-5 container">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="ejemplo" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>nombre</th>
                                        <th># tutor</th>
                                        <th>Tipo</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                    <tr>
                                            <?php
                                            include('acciones/conec.php');
                                            $consulta2="SELECT * FROM tipo_servicio";
                                            $resultado2=mysqli_query($conexion,$consulta2); 
                                            while($fila2=mysqli_fetch_array($resultado2)){
                                                $imagen =$fila2["img"];
                                            ?>
                                        <td> <?php echo $fila2["cod_servicio"]?></th>
                                        
                                        <td> <?php echo "<img  class='img-thumbnail' width='100px' src='../assets/img/$imagen'/>" ?>
                                        </td>
                                        <td> <?php echo $fila2["nom_servicio"] ?> </td>
                                        <td> <?php echo $fila2["fk_cod_tutor"] ?> </td>
                                        <td> <?php echo $fila2["tipo_servicio"] ?> </td>
                                        <td> <?php echo $fila2["descripcion"] ?> </td>
                                        <td>  
                                            <a target="_self" href="acciones/eliminarServicio.php?idServicio=<?php echo $fila2["cod_servicio"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EditarServicio.php?idServicio=<?php echo $fila2["cod_servicio"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a>  
                                            <!-- <button type="button" name="btnEliminar"  id="submit" class="btn btn-primary"><ion-icon class="trash" name="trash-outline"></ion-icon></button>
                                            <button type="button" name="btnModificar"  class="btn btn-primary"><ion-icon class="edit" name="create-outline"></ion-icon></button> -->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
    <script type="text/javascript" >
        $(document).ready(function () {
            $('#ejemplo').DataTable();
        });
    
    </script>
    
</body>

</html>