<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "autocinema";


$conn = new mysqli($host_db, $user_db, $pass_db, $db_name);
if (!$conn->set_charset("utf8")) {
    //printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
    exit();
} else {
    //printf("Conjunto de caracteres actual: %s\n", $conn->character_set_name());
}
?>