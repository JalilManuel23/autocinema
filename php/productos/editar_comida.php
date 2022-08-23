<?php

include '../conexion.php';

    // error_reporting(0);
    if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio'])){

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
    
        $update = mysqli_query($conn, "UPDATE comida SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', stock = '$stock' WHERE id = '$id' ");

        if ($update) {
            $comidas = array();
            $select = mysqli_query($conn, "SELECT * FROM comida");
            foreach ($select as $comida) {
                $comidas[] = $comida;
            }
            echo json_encode($comidas);
        }else{
            echo json_encode("error");
        }
    }else{
        echo json_encode("vacio");
    }

?>