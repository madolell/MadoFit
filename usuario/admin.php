<?php
session_start();
include("../../../Auxiliares/conecta.php");

// Verificar si el usuario admin ha iniciado sesión
if (isset($_SESSION['email']) && $_SESSION['email'] === 'admin') {
    // El usuario admin ha iniciado sesión, mostrar el contenido del panel de administración
    // Aquí puedes incluir el código y contenido específico del panel de administración
    echo "Bienvenido, administrador!";
} else {
    // El usuario no ha iniciado sesión o no es el usuario admin, redirigir a la página de inicio de sesión
    header("Location: login.php");
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
</head>

<body>
    <div class="container">
        <h1>Bienvenido al Panel de Administración</h1>
        <!-- Contenido adicional del panel de administración -->
        <div class="container">
            <h2>Lista de usuarios</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Fecha de nacimiento</th>
                        <th>Altura</th>
                        <th>Peso</th>
                        <th>Provincia</th>
                        <th>Poblacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Realizar la consulta a la base de datos para obtener los usuarios
                    $sql = "SELECT * FROM usuarios";
                    $result = $conn->query($sql);
        
                    // Verificar si se encontraron usuarios
                    if ($result->num_rows > 0) {
                        // Iterar sobre los resultados y generar las filas de la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_usuario'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['apellidos'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                            echo "<td>" . $row['altura'] . "</td>";
                            echo "<td>" . $row['peso'] . "</td>";
                            echo "<td>" . $row['provincia'] . "</td>";
                            echo "<td>" . $row['poblacion'] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_user.php?id=" . $row['id_usuario'] . "' class='btn btn-primary'>Editar</a>";
                            echo "<a href='deactivate_user.php?id=" . $row['id_usuario'] . "' class='btn btn-warning'>Desactivar</a>";
                            echo "<a href='delete_user.php?id=" . $row['id_usuario'] . "' class='btn btn-danger'>Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // No se encontraron usuarios
                        echo "<tr><td colspan='11'>No se encontraron usuarios.</td></tr>";
                    }
        
                    // Liberar los recursos de la consulta
                    $result->free();
                    ?>
                </tbody>
            </table>
        </div>
        <div>
            <h2>Crear usuario</h2>
            <form action="create_user.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear usuario</button>
            </form>

            <h2>Editar usuario</h2>
            <form action="edit_user.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required value="John Doe">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required value="johndoe@example.com">
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
            
            <h2>Configuración del sistema</h2>
            <form action="system_settings.php" method="POST">
                <!-- Aquí se agregarían las opciones de configuración del sistema -->
                <button type="submit" class="btn btn-primary">Guardar configuración</button>
            </form>
        </div>
    </div>
    <!-- Scripts JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>