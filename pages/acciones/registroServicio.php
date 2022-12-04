<?php
include('conec.php');
    session_start();
    $accion= (isset($_POST['btnAgregar']));
    //$nomImagenPaquete= $_REQUEST["txtnom"];
    
    
    //fin cargar imagen//
    $nombreServicio= $_POST['nombreServicio'];
    $tipoServicio= $_POST['tipoServicio'];
    $tutor= $_POST['tutor'];
    $disponibilidad= $_POST['dispon'];
    $Descripcion= $_POST['descripcion'];
    switch($accion){
        case TRUE:
            $imagenPaquete=$_FILES['txtnom']['name'];
            $ruta= $_FILES["txtnom"]["tmp_name"];
            $destino="../../assets/img/".$imagenPaquete;
            copy($ruta,$destino);
            $registrarPaquete= "INSERT INTO tipo_servicio(fk_cod_tutor, img, nom_servicio, tipo_servicio,
            disponibilidad, descripcion) 
            VALUE ('$tutor','$imagenPaquete','$nombreServicio','$tipoServicio',' $disponibilidad', '$Descripcion')";
            $resultados=mysqli_query($conexion,$registrarPaquete);
            echo "<script type='text/javascript'>
                alert('Guardado correctamente');
                window.location.href = '../edicionServicios.php';
            </script>";
            break;
        case false:
                $codServicio = $_POST['codServicio'];
                $registrarPaquete= "UPDATE paquete SET 
                fk_cod_tutor =$tutor,
                nom_servicio = '$nombreServicio',
                tipo_servicio = $tipoServicio,
                disponibilidad = '$disponibilidad',
                descripcion ='$Descripcion'
                WHERE cod_servicio=$codServicio";
            
            $resultados=mysqli_query($conexion,$registrarPaquete);
            header('location: ../Paginas/altapaquetes.php');
        break; 
    }
        

    

//redireccionar
    
    
?>