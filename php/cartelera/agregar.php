<?php
	include '../conexion.php';
	
	$foto = $_FILES['img'];
	$nuevaRuta = "../../public/img/cartelera/".$foto['name'];
	$tmp_name = $foto["tmp_name"];
	$name = $foto['name'];
    $genero = $_POST['generoPelicula'];
    $nombrePelicula = $_POST['tituloPelicula'];
    $sinopsis = $_POST['descripcion'];
    $horario = $_POST['horarioPelicula'];
    $idioma = $_POST['idiomaPelicula'];
    $duracion = $_POST['duracionPelicula'];
    $formato = $_POST['formatoPelicula'];

	$sql = "INSERT INTO cartelera (imagen, genero, nombre, descripcion, horario, idioma, duracion, formato) VALUES ('$name','$genero', '$nombrePelicula', '$sinopsis', '$horario', '$idioma', '$duracion', '$formato')";
	$res = mysqli_query($conn, $sql);

	if ($res)
	{
		move_uploaded_file($tmp_name, $nuevaRuta);     
		echo json_encode("correcto");
	}
	else
	{
		echo json_encode("error");
		echo mysqli_error($conn);
	}
?>