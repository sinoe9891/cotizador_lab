<?php
include 'conexion.php';

if (isset($_POST['id']) && isset($_POST['precio'])) {
    $id = $_POST['id'];
    $precio = $_POST['precio'];

    $sql = "UPDATE exa_rutina SET precio = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $precio, $id);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
} else {
    echo "Error: Faltan parámetros";
}
?>