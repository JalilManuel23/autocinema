<?php
include '../conexion.php';

$id = $_REQUEST['id'];

$sel = $conex->query("SELECT * FROM clientes WHERE id='$id'");

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

        $update = $conex->query("UPDATE clientes SET nombre = '$nombre', 
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
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />


    <title>Edita tu perfil</title>
</head>

<body>
    <div>
        <center>
            <h2 class="font-weight-bolder text-info text-gradient">Actualiza tu Información</h2>
            <main class="main-content mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <div class="card-body">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                            <div class="mb-3">
                                                <label for="nombre">Nombre: </label>
                                                <input class="mb-3" type="text" name="nombre" placeholder="Edita tu nombre" value="<?php echo $fila['nombre']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ape_paterno">Apellido Paterno: </label>
                                                <input class="mb-3" type="text" name="ape_paterno" placeholder="Edita tu Apellido Paterno" value="<?php echo $fila['ape_paterno']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="ape_materno">Apellido Materno: </label>
                                                <input class="mb-3" type="text" name="ape_materno" placeholder="Edita tu Apellido Materno" value="<?php echo $fila['ape_materno']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="bio">Biografia: </label>
                                                <input type="text" name="bio" placeholder="Edita tu Biografia" value="<?php echo $fila['bio']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="calle">Tu Calle: </label>
                                                <input type="text" name="calle" placeholder="Edita tu Calle" value="<?php echo $fila['calle']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="col">Colonia: </label>
                                                <input type="text" name="col" placeholder="Edita tu Colonia" value="<?php echo $fila['col']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="numero">Numero de Vivienda: </label>
                                                <input type="text" name="numero" placeholder="Edita tu Numero de vivienda" value="<?php echo $fila['numero']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="zipcode">Codigo Postal: </label>
                                                <input type="text" name="zipcode" placeholder="Edita tu Codigo Postal" value="<?php echo $fila['zipcode']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email">Correo: </label>
                                                <input type="email" name="email" placeholder="Edita tu Correo Electronico" value="<?php echo $fila['email']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass">Contraseña: </label>
                                                <input type="password" name="pass" placeholder="Nueva contraseña" value="<?php echo $fila['pass']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="telefono">Numero de Telefono: </label>
                                                <input type="number" name="telefono" placeholder="Nueva Numero de telefono" value="<?php echo $fila['telefono']; ?>" required>
                                            </div>
                                            <br><br>
                                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                            <input class="btn" type="submit" value="Actualizar" name="envio">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </center>
        <a class="btn" href="../../pages/cliente.php">Volver</a>
        <a style="color: red" class="btn" href="eliminar.php?id=<?php echo $fila['id']; ?>">ELIMINAR CUENTA</a>
        <a style="color: green" class="btn" href="modificar_foto.php?id=<?php echo $fila['id']; ?>">Modificar Foto de Perfil</a>
    </div>
</body>

</html>