<?php
	include 'conexion.php';
	$foto = $_FILES['imagen'];
	$nuevaRuta = "../assets/img/cartelera/".$foto['name'];
	$tmp_name = $foto["tmp_name"];
	$name = $foto['name'];
    $genero = $_POST['genero'];
    $nombrePelicula = $_POST['tituloPelicula'];
    $sinopsis = $_POST['sinopsis'];

	$sql = "INSERT INTO cartelera (imagen, genero, nombre, descripcion) VALUES ('$name','$genero', '$nombrePelicula', '$sinopsis')";
	$res = mysqli_query($conn, $sql);

	if ($res)
	{
		move_uploaded_file($tmp_name, $nuevaRuta);     
		echo json_encode("1");
	}
	else
	{
		echo json_encode("0");
		echo mysqli_error($conn);
	}
?>