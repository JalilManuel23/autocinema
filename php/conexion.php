<?php

// $host_db = "localhost";
// $user_db = "root";
// $pass_db = "";
// $db_name = "autocinema";

$host_db = "localhost:3306";
$user_db = "cesenasc_user";
$pass_db = "aHx9Mz1XZoro";
$db_name = "cesenasc_autocinema";


$conn = new mysqli($host_db, $user_db, $pass_db, $db_name);
if (!$conn) {
    // printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
    exit();
} else {
    // printf("Conjunto de caracteres actual: %s\n", $conn->character_set_name());
}
?>