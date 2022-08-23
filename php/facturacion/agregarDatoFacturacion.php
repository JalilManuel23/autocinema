<?php
	include "../conexion.php";
	
    if (isset($_POST["clienteid2"])) {
        $clienteid = $_POST["clienteid2"];
    }

    if (isset($_POST["correo_electronico"])) {
        $correo_electronico = $_POST["correo_electronico"];
    }

    if (isset($_POST["clave"])) {
        $clave = $_POST["clave"];
    }

    $sql = mysqli_query($conn, "INSERT INTO dato_facturacion (correo_electronico, clave, cliente_id) VALUES ('$correo_electronico', '$clave', '$clienteid')");

	if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}
