<?php
	include '../conexion.php';
	
    if (!empty($_POST['fecha_hora']) && !empty($_POST['precio']) && !empty($_POST['id_cartelera'])){
		        
		$fecha_hora = $_POST['fecha_hora'];
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];
		$id_cartelera = $_POST['id_cartelera'];

		$insert = mysqli_query($conn, "INSERT INTO boletos VALUES ('','$fecha_hora', '$precio', '$stock', '$id_cartelera')");

		if ($insert) {
			$boletos = array();
            $select_boletos = mysqli_query($conn, "SELECT * FROM boletos");
            $i = 0;
            foreach ($select_boletos as $boleto) {
                $boletos[$i] = $boleto;
                $id_cartelera = $boleto['id_cartelera'];
                $select_cartelera = mysqli_query($conn, "SELECT * FROM cartelera WHERE id_cartelera = $id_cartelera");

                    foreach ($select_cartelera as $cartelera) {
                            $boletos[$i] += $cartelera;
                    }

                $i++;
            }
            echo json_encode($boletos);
		} else {
			echo json_encode("error");
		}
	} else {
		echo json_encode("vacio");
	}
?>