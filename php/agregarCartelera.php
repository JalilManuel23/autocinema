<?php
	include './conexion.php';
	$foto = $_FILES['imagen'];
	$nuevaRuta = "../assets/img/cartelera/".$foto['name'];
	$tmp_name = $foto["tmp_name"];
	$name = $foto['name'];
    $genero = $_POST['generoPelicula'];
    $nombrePelicula = $_POST['tituloPelicula'];
    $sinopsis = $_POST['sinopsisPelicula'];

	$sql = "INSERT INTO cartelera (imagen, genero, nombre, descripcion) VALUES ('$name','$genero', '$nombrePelicula', '$sinopsis')";
	$res = mysqli_query($conn, $sql);

	if ($res)
	{
		move_uploaded_file($tmp_name, $nuevaRuta);     
		echo 1;
	}
	else
	{
		echo mysqli_error($conn);
	}
?>