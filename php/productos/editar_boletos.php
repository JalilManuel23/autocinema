<?php

include '../conexion.php';

    // error_reporting(0);
    if (!empty($_POST['id']) && !empty($_POST['fecha_hora']) && !empty($_POST['precio']) && !empty($_POST['id_cartelera'])){

        $id = $_POST['id'];
        $fecha_hora = $_POST['fecha_hora'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $id_cartelera = $_POST['id_cartelera'];
    
        $update = mysqli_query($conn, "UPDATE boletos SET fecha_hora = '$fecha_hora', precio = '$precio', stock = '$stock', id_cartelera = '$id_cartelera' WHERE id = '$id' ");

        if ($update) {
            $boletos = array();
            $select_boletos = mysqli_query($conn, "SELECT * FROM boletos");
            $select_cartelera = mysqli_query($conn, "SELECT * FROM cartelera WHERE id_cartelera = $id_cartelera");
            $i = 0;
            foreach ($select_boletos as $boleto) {
                $boletos[$i] = $boleto;

                if($i == 0){
                    foreach ($select_cartelera as $cartelera) {                    
                        $boletos[$i] += $cartelera;
                    }
                }

                $i++;
            }
            echo json_encode($boletos);
        }else{
            echo json_encode("error");
        }
    }else{
        echo json_encode("vacio");
    }

?>