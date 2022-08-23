<?php
include '../conexion.php';

$id = $_REQUEST['id'];

$sel = $conn->query("SELECT * FROM clientes WHERE id='$id'");

if ($fila = $sel->fetch_assoc()) {
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['nombre']) && !empty($_POST['id']) && !empty($_POST['email'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $ape_paterno = $_POST['ape_paterno'];
        $ape_materno = $_POST['ape_materno'];
        $bio = $_POST['bio'];
        $calle = $_POST['calle'];
        $col = $_POST['col'];
        $numero = $_POST['numero'];
        $zipcode = $_POST['zipcode'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $telefono = $_POST['telefono'];

        $update = $conn->query("UPDATE clientes SET nombre = '$nombre', 
        ape_paterno = '$ape_paterno', ape_materno = '$ape_materno', bio = '$bio', 
        calle = '$calle', col = '$col', numero = '$numero', zipcode = '$zipcode', 
        email = '$email', pass = '$pass', telefono = '$telefono' WHERE id = '$id'");

        if ($update) {
            echo "<script> alert('Los datos se actualizaron con exito')</script>";
        } else {
            echo "<script> alert('Ocurrio un error intentalo mas tarde') location.href=../../pages/cliente.php </script>
                ";
        }
    } else {

        echo "<script> alert('Faltan datos')</script>";
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita tu perfil</title>
</head>

<body>
    <div>
        <center>
            <h1>Actualizar tu Información</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="Edita tu nombre" value="<?php echo $fila['nombre']; ?>" required>
                <label for="ape_paterno"></label>
                <input type="text" name="ape_paterno" placeholder="Edita tu Apellido Paterno" value="<?php echo $fila['ape_paterno']; ?>">
                <label for="ape_materno"></label>
                <input type="text" name="ape_materno" placeholder="Edita tu Apellido Materno" value="<?php echo $fila['ape_materno']; ?>">
                <label for="bio"></label>
                <input type="text" name="bio" placeholder="Edita tu Biografia" value="<?php echo $fila['bio']; ?>">
                <label for="calle"></label>
                <input type="text" name="calle" placeholder="Edita tu Calle" value="<?php echo $fila['calle']; ?>">
                <label for="col"></label>
                <input type="text" name="col" placeholder="Edita tu Colonia" value="<?php echo $fila['col']; ?>">
                <label for="numero"></label>
                <input type="text" name="numero" placeholder="Edita tu Numero de vivienda" value="<?php echo $fila['numero']; ?>">
                <label for="zipcode"></label>
                <input type="text" name="zipcode" placeholder="Edita tu Codigo Postal" value="<?php echo $fila['zipcode']; ?>">
                <label for="email">Correo:</label>
                <input type="email" name="email" placeholder="Edita tu Correo Electronico" value="<?php echo $fila['email']; ?>" required>
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" placeholder="Nueva contraseña" value="<?php echo $fila['pass']; ?>" required>
                <label for="telefono">Numero de Telefono:</label>
                <input type="number" name="telefono" placeholder="Nueva Numero de telefono" value="<?php echo $fila['telefono']; ?>" required>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                <input class="btn" type="submit" value="Actualizar" name="envio">
            </form>
        </center>
        <a class="btn" href="../../pages/cliente.php">Volver</a>
        <a class="btn" href="eliminar.php?id=<?php echo $fila['id'];?>">ELIMINAR CUENTA</a>
    </div>
</body>

</html>