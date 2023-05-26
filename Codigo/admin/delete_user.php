<?php
session_start();
require "../Auxiliares/conecta.php";

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
    header('Location: ../formulario/login.php'); // Redirigir al usuario a la página de inicio de sesión
    exit();
}

// Verificar si se ha proporcionado un ID de usuario válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Eliminar el usuario de la base de datos
    $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $stmt->close();

    // Redireccionar al usuario a la página de lista de usuarios
    header('Location: admin.php');
    exit();
} else {
    // No se proporcionó un ID de usuario válido, redireccionar al usuario a la página de lista de usuarios
    header('Location: admin.php');
    exit();
}
?>
