<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "autocinema";

//$host_db = "sql106.epizy.com";
//$user_db = "epiz_26022332";
//$pass_db = "axCXixKvi6pT0PV";
//$db_name = "epiz_26022332_autocinema";


$conn = new mysqli($host_db, $user_db, $pass_db, $db_name);
if (!$conn->set_charset("utf8")) {
    //printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
    exit();
} else {
    //printf("Conjunto de caracteres actual: %s\n", $conn->character_set_name());
}
?>