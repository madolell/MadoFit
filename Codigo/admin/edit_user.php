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

    // Obtener la información del usuario de la base de datos
    $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();

    // Verificar si se encontró al usuario
    if (!$usuario) {
        // No se encontró al usuario, redireccionar al usuario a la página de lista de usuarios
        header('Location: admin.php');
        exit();
    }
} else {
    // No se proporcionó un ID de usuario válido, redireccionar al usuario a la página de lista de usuarios
    header('Location: admin.php');
    exit();
}

// Verificar si se envió el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $provincia = $_POST["provincia"];
    $poblacion = $_POST["poblacion"];

    // Actualizar la información del usuario en la base de datos
    $sql = "UPDATE usuarios SET nombre = ?, apellidos = ?, email = ?, password = ?, fecha_nacimiento = ?, altura = ?, peso = ?, provincia = ?, poblacion = ? WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $nombre, $apellidos, $email, $password, $fechaNacimiento, $altura, $peso, $provincia, $poblacion, $idUsuario);
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
    <title>Editar usuario</title>
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
        <div class="row justify-content-center ">
            <div class="col-md-6 text-bg-dark border-5 shadow p-4">
                <div class="text-center">
                    <a href="../Inicio.php"><img src="../fotos/logosinbg.png" class="img-fluid w-50" alt="Logo"></a>
                    <h3 class="pb-2">Editar usuario</h3>
                </div>
                <form action="edit_user.php?id=<?php echo $idUsuario; ?>" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $usuario['password']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario['fecha_nacimiento']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura</label>
                        <input type="number" step="0.01" class="form-control" id="altura" name="altura" value="<?php echo $usuario['altura']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso</label>
                        <input type="number" step="0.01" class="form-control" id="peso" name="peso" value="<?php echo $usuario['peso']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="provincia" class="form-label">Provincia</label>
                        <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $usuario['provincia']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="poblacion" class="form-label">Población</label>
                        <input type="text" class="form-control" id="poblacion" name="poblacion" value="<?php echo $usuario['poblacion']; ?>" required>
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Scripts JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>