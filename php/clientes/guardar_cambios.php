<?php
    include '../conexion.php';

    $id = $_REQUEST['id'];

    $imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

    $query = "UPDATE clientes SET img='$imagen' WHERE id = '$id'";
    $update = $conex->query($query);

    if($update){
        echo "Se modifico con exito";
        header("Location: ../../pages/cliente.php");
    }else{
        echo "No se actualizo, intentalo mas tarde";
    }



?>