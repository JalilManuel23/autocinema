<?php
	include '../conexion.php';
	
    if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio'])){
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];

		$insert = mysqli_query($conn, "INSERT INTO comida VALUES ('','$nombre', '$descripcion', '$precio', $stock)");

		if ($insert) {
			$comidas = array();
            $select = mysqli_query($conn, "SELECT * FROM comida");
            foreach ($select as $comida) {
                $comidas[] = $comida;
            }
            echo json_encode($comidas);
		} else {
			echo json_encode("error");
		}
	} else {
		echo json_encode("vacio");
	}
?>