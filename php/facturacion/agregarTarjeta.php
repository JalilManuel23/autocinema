<?php
	include "../conexion.php";
	
    if (isset($_POST["clienteid"])) {
        $clienteid = $_POST["clienteid"];
    }

    if (isset($_POST["titular"])) {
        $titular = $_POST["titular"];
    }

    if (isset($_POST["numero"])) {
        $numero = $_POST["numero"];
    }

    if (isset($_POST["fechaexpiracion"])) {
        $fechaexpiracion = $_POST["fechaexpiracion"];
    }

    if (isset($_POST["tarjetahabiente"])) {
        $tarjetahabiente = $_POST["tarjetahabiente"];
    }

    $sql = mysqli_query($conn, "INSERT INTO tarjeta (numerotarjeta, titular, expiracion, tarjetahabiente, cliente_id) VALUES ('$numero', '$titular', '$fechaexpiracion', '$tarjetahabiente', '$clienteid')");

	if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}
