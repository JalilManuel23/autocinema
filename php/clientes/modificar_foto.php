<?php
include '../conexion.php';

$id = $_REQUEST['id'];

$query = "SELECT * FROM clientes WHERE id = '$id'";
$result = $conex->query($query);
$fila = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Foto de Perfil</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body>
    <center>
        <h2 class="font-weight-bolder text-info text-gradient">Modifica tu foto de Pefil</h2>
        <form action="guardar_cambios.php?id=<?php echo $fila['id']; ?>" method="POST" enctype="multipart/form-data">
            <img height="264px" src="data:image/jpg;base64,<?php echo base64_encode($fila['img']) ?>">
            <div class="container">
                <div class="col-xl-5 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="mb-3">
                        <input type="file" name="Imagen">
                        <div class="mb-3">
                            <input type="submit" value="Aceptar">
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </center>
</body>

</html>