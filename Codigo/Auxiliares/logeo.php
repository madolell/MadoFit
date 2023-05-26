<?php
session_start();
require "conecta.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT id_usuario, email, password, nombre FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Vincular los resultados de la consulta a variables
        $stmt->bind_result($id, $email, $hashedPassword, $nombre);
        $stmt->fetch();

        // Verificar la contraseña ingresada con la contraseña almacenada en la base de datos
        if (password_verify($password, $hashedPassword)) {
            // Las credenciales son válidas

            // Almacenar los datos del usuario en la sesión
            $_SESSION['id_usuario'] = $id;
            $_SESSION["email"] = $email;    
            $_SESSION["nombre"] = $nombre;

            // Verificar si es el usuario administrador
            if ($email === 'admin@admin.com') {
                // Redireccionar al usuario administrador a admin.php
                header("Location: ../admin/admin.php");
                exit();
            } else {
                // Redireccionar al usuario a su página de inicio
                header("Location: ../Inicio.php");
                exit();
            }
        } else {
            // Contraseña incorrecta, agregar mensaje de error
            $_SESSION["mensajeError"] = "Contraseña incorrecta";

            // Redireccionar al usuario a la página de inicio de sesión
            header("Location: ../formulario/login.php");
            exit();
        }
    } else {
        // Usuario no encontrado, agregar mensaje de error
        $_SESSION["mensajeError"] = "El usuario no existe";

        // Redireccionar al usuario a la página de inicio de sesión
        header("Location: ../formulario/login.php");
        exit();
    }

    $stmt->close(); // Cerrar la consulta preparada
    $conn->close(); // Cerrar la conexión a la base de datos
}
