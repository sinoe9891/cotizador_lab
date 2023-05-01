<?php
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT id, nombre, precio FROM exa_rutina";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>