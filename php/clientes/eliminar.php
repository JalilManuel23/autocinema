<?php

include_once("../conexion.php");

$id = $_REQUEST['id'];




$eli=$conn->query("DELETE FROM clientes WHERE id = '$id'");


if ($eli){
    echo "<script> alert('SE ELIMINÓ CON ÉXITO')  </script>";

    echo "<script> location.href='../../index.php'  </script>";
}else{
    echo "<script> alert('Ocurrio, un error intentalo mas tarde')  </script>";


    echo "<script> location.href='../../pages/cliente.php'  </script>";
}


?>