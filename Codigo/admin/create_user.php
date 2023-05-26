<?php
session_start();
require "../Auxiliares/conecta.php";

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
    header('Location: ../formulario/login.php'); // Redirigir al usuario a la página de inicio de sesión
    exit();
}

// Verificar si se envió el formulario de creación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $nombre = $_POST["name"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $provincia = $_POST["provincia"];
    $poblacion = $_POST["poblacion"];

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, fecha_nacimiento, altura, peso, provincia, poblacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $nombre, $apellidos, $email, $password, $fecha_nacimiento, $altura, $peso, $provincia, $poblacion);
    $stmt->execute();
    $stmt->close();

    // Redireccionar al usuario a la página de lista de usuarios
    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administración</title>
    <link rel="icon" href="../fotos/logosolo.png">
    <!-- Enlaces CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(../fotos/fondologin.jpg   );
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-bg-dark border-5 shadow p-4">
                <div class="text-center">
                <a href="../Inicio.php"><img src="../fotos/logosinbg.png" class="img-fluid w-50" alt="Logo"></a>
                <h3 class="pb-2">Crear usuario</h3>
                </div>
                <form action="create_user.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura</label>
                        <input type="number" class="form-control" id="altura" name="altura" required>
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" class="form-control" id="peso" name="peso" required>
                    </div>
                    <div class="mb-3">
                        <label for="provincia" class="form-label">Provincia</label>
                        <input type="text" class="form-control" id="provincia" name="provincia" required>
                    </div>
                    <div class="mb-3">
                        <label for="poblacion" class="form-label">Población</label>
                        <input type="text" class="form-control" id="poblacion" name="poblacion" required>
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button type="submit" class="btn btn-primary">Crear usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Scripts JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>