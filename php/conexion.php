<?php

$conex=new mysqli('127.0.0.1','guty','purautd','autocinema');

/* comprobar la conexión */
if ($conex->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}



?>