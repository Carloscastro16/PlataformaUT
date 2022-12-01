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
                $registrarPaquete= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            
            $resultados=mysqli_query($conexion,$registrarPaquete);
            header('location: ../Paginas/altapaquetes.php');
        break; 
    }
        

    

//redireccionar
    
    
?>