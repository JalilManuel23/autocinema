<?php
	include "../conexion.php";

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }

    $sql = mysqli_query($conn, "DELETE FROM cartelera WHERE id_cartelera = '$id'");

    if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}