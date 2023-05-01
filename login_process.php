<?php
session_start();
include 'conexion.php';

$response = array('success' => false, 'message' => '');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $response['success'] = true;
        } else {
            $response['message'] = "Usuario o Contraseña incorrecta.";
        }
    } else {
        $response['message'] = "Usuario o Contraseña incorrecta.";
    }
}

echo json_encode($response);
?>
