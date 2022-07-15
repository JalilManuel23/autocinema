<?php

    session_start();
    include 'conexion.php';
    // error_reporting(0);
    if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['genero'])){

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $genero = $_POST['genero'];

            $_FILES['img']['name'] = $id.".jpg";
            $imagen=$_FILES['img']['name'];

            $ruta=$_FILES['img']['tmp_name'];
            $destino="../assets/img/cartelera/".$imagen;
            copy($ruta,$destino);

            $update = mysqli_query($conn, "UPDATE cartelera SET imagen = '$imagen', nombre = '$nombre', descripcion = '$descripcion', genero = '$genero' WHERE id_cartelera = '$id' ");

            if ($update) {
                echo json_encode("correcto");
            }else{
                echo json_encode("error");
            }
    }else{
        echo json_encode('vacio');
    }

?>