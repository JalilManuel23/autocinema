<?php
	include "../conexion.php";

    if (isset($_POST["id3"])) {
        $id = $_POST["id3"];
    }

    if (isset($_POST["descripcion"])) {
        $descripcion = $_POST["descripcion"];
    }

    if (isset($_POST["cantidad"])) {
        $cantidad = $_POST["cantidad"];
    }

    if (isset($_POST["clienteid3"])) {
        $clienteid = $_POST["clienteid3"];
    }

    $sql = mysqli_query($conn, "UPDATE transaccion SET descripcion = '$descripcion', cantidad = '$cantidad', cliente_id = '$clienteid' WHERE id = '$id'");

    if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}