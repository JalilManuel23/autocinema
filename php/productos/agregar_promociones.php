<?php
	include '../conexion.php';
	
    if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['inicio']) && !empty($_POST['fin'])){

		$foto = $_FILES['img'];
		$nuevaRuta = "../../public/img/promociones/".$foto['name'];
		$tmp_name = $foto["tmp_name"];
		$name = $foto['name'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];

		$insert = mysqli_query($conn, "INSERT INTO promociones VALUES ('', '$name', '$nombre', '$descripcion', '$precio', '$inicio', '$fin')");

		if ($insert) {
			$promociones = array();
            $select = mysqli_query($conn, "SELECT * FROM promociones");
            foreach ($select as $promocion) {
                $promociones[] = $promocion;
            }
			move_uploaded_file($tmp_name, $nuevaRuta);
            echo json_encode($promociones);
		} else {
			echo json_encode('error');
		}
	} else {
		echo json_encode("vacio");
	}
?>