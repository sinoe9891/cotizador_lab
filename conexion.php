<?php
// $host = "localhost";
// $username = "laborx4z_wp181";
// $password = "S7p44l@]Zy";
// $database_name = "laborx4z_lab_catacamas";
// $conn = new mysqli($host, $username, $password, $database_name);

// if ($conn->connect_error) {
//         echo 'Conexión Fallida: ', $conn->connect_error;
// }
// $conn->set_charset("utf8");

$host = "localhost";
$username = "root";
$password = "";
$database_name = "lab_catacamas";
$conn = new mysqli($host, $username, $password, $database_name);

if ($conn->connect_error) {
        echo 'Conexión Fallida: ', $conn->connect_error;
}
$conn->set_charset("utf8");

