<?php
	include "../conexion.php";

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }
	
    if (isset($_POST["clienteid2"])) {
        $clienteid2 = $_POST["clienteid2"];
    }

    if (isset($_POST["correo_electronico"])) {
        $correo_electronico = $_POST["correo_electronico"];
    }

    if (isset($_POST["clave"])) {
        $clave = $_POST["clave"];
    }

    $sql = mysqli_query($conn, "UPDATE dato_facturacion SET correo_electronico = '$correo_electronico', clave = '$clave', cliente_id = '$clienteid2' WHERE id = '$id'");

    if ($sql) {
		echo json_encode("HECHO");
	} else {
		echo json_encode("ERROR: " . mysqli_error($conn));
	}