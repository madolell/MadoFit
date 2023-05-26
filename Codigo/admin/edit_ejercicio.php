<?php
session_start();
require "../Auxiliares/conecta.php";

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
    header('Location: ../formulario/login.php'); // Redirigir al usuario a la página de inicio de sesión
    exit();
}

// Verificar si se ha proporcionado un ID de ejercicio válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idEjercicio = $_GET['id'];

    // Obtener la información del ejercicio de la base de datos
    $sql = "SELECT * FROM ejercicios WHERE id_ejercicio = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idEjercicio);
    $stmt->execute();
    $result = $stmt->get_result();
    $ejercicio = $result->fetch_assoc();
    $stmt->close();

    // Verificar si se encontró el ejercicio
    if (!$ejercicio) {
        // No se encontró el ejercicio, redireccionar al usuario a la página de lista de ejercicios
        header('Location: admin.php');
        exit();
    }
} else {
    // No se proporcionó un ID de ejercicio válido, redireccionar al usuario a la página de lista de ejercicios
    header('Location: admin.php');
    exit();
}

// Verificar si se envió el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $grupoMuscular = $_POST["grupo_muscular"];
    $equipoNecesario = $_POST["equipo_necesario"];
    $imagen = $_POST["imagen"];

    // Actualizar la información del ejercicio en la base de datos
    $sql = "UPDATE ejercicios SET nombre = ?, descripcion = ?, grupo_muscular = ?, equipo_necesario = ?, imagen = ? WHERE id_ejercicio = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $descripcion, $grupoMuscular, $equipoNecesario, $imagen, $idEjercicio);
    $stmt->execute();
    $stmt->close();

    // Redireccionar al usuario a la página de lista de ejercicios
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar ejercicio</title>
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
                    <h3 class="pb-2">Editar ejercicio</h3>
                </div>
                <form action="edit_ejercicio.php?id=<?php echo $idEjercicio; ?>" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $ejercicio['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required><?php echo $ejercicio['descripcion']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="grupo_muscular" class="form-label">Grupo Muscular</label>
                        <input type="text" class="form-control" id="grupo_muscular" name="grupo_muscular" value="<?php echo $ejercicio['grupo_muscular']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="equipo_necesario" class="form-label">Equipo Necesario</label>
                        <input type="text" class="form-control" id="equipo_necesario" name="equipo_necesario" value="<?php echo $ejercicio['equipo_necesario']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="text" class="form-control" id="imagen" name="imagen" accept=".jpg, .jpeg, .png" value="<?php echo $ejercicio['imagen']; ?>" required>
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