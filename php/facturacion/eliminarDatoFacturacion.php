<?php
	include "../conexion.php";

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }

    $sql = mysqli_query($conn, "DELETE FROM dato_facturacion WHERE id = '$id'");

    if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}