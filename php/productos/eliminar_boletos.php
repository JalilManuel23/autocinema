<?php
	include '../conexion.php';
	
    if (!empty($_POST['id'])){
        
        $id = $_POST['id'];		

        $delete = mysqli_query($conn, "DELETE FROM boletos WHERE id = $id");

		if ($delete) {
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