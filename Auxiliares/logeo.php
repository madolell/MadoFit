<?php
session_start();
require "conecta.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Validar las credenciales del usuario
    if ($result->num_rows == 1) {
         // Obtener los datos del usuario
         $usuario = $result->fetch_assoc();

         // Almacenar los datos del usuario en la sesión
         $_SESSION['id_usuario'] = $usuario['id'];
         $_SESSION["email"] = $usuario["email"];    
         $_SESSION["nombre"] = $usuario["nombre"];

        // Redireccionar al usuario a su página de inicio
        header("Location: ../Inicio.php");
        exit();
    } else {
        // Credenciales incorrectas, agregar mensaje de error
        $_SESSION["mensajeError"] = "El usuario es incorrecto";

         // Redireccionar al usuario a la página de inicio de sesión
         header("Location: ../formulario/login.php");
         exit();
    }

    $stmt->close(); // Cerrar la consulta preparada
    $conn->close(); // Cerrar la conexión a la base de datos
}
