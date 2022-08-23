<?php
	include "../conexion.php";
	
    if (isset($_POST["transaccionid"])) {
        $transaccionid = $_POST["transaccionid"];
    }

    if (isset($_POST["datosid"])) {
        $datosid = $_POST["datosid"];
    }

    $sql = mysqli_query($conn, "INSERT INTO factura (datofacturacion_id, transaccion_id) VALUES ('$datosid', '$transaccionid')");

	if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}
