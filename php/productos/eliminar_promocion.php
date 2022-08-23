<?php
	include '../conexion.php';
	
    if (!empty($_POST['id'])){
        
        $id = $_POST['id'];		

        $delete = mysqli_query($conn, "DELETE FROM promociones WHERE id = $id");

		if ($delete) {
			$registros = array();
            $select = mysqli_query($conn, "SELECT * FROM promociones");
            foreach ($select as $registro) {
                $registros[] = $registro;
            }
            echo json_encode($registros);
		} else {
			echo json_encode("error");
		}
	} else {
		echo json_encode("vacio");
	}
?>