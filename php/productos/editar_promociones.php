<?php

include '../conexion.php';

    // error_reporting(0);
    if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['inicio']) && !empty($_POST['fin'])){

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];

        $_FILES['img']['name'] = $id.".jpg";
        $imagen=$_FILES['img']['name'];

        $ruta=$_FILES['img']['tmp_name'];
        $destino="../../public/img/promociones/".$imagen;
        copy($ruta,$destino);
    
        $update = mysqli_query($conn, "UPDATE promociones SET imagen = '$imagen', nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', fecha_inicio = '$inicio', fecha_fin = '$fin' WHERE id = '$id' ");

        if ($update) {
            $registros = array();
            $select = mysqli_query($conn, "SELECT * FROM promociones");
            foreach ($select as $registro) {
                $registros[] = $registro;
            }
            echo json_encode($registros);
        }else{
            echo json_encode("error");
        }
    }else{
        echo json_encode("vacio");
    }

?>