<?php
	include "../conexion.php";

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }
	
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

    $sql = mysqli_query($conn, "UPDATE tarjeta SET numerotarjeta = '$numero', titular = '$titular', expiracion = '$fechaexpiracion', tarjetahabiente = '$tarjetahabiente', cliente_id = '$clienteid' WHERE id = '$id'");

    if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}