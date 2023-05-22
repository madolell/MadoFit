<?php
session_start();

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
                        <th>Correo electrónico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se generaría dinámicamente la lista de usuarios -->
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td>
                            <a href="edit_user.php?id=1" class="btn btn-primary">Editar</a>
                            <a href="deactivate_user.php?id=1" class="btn btn-warning">Desactivar</a>
                            <a href="delete_user.php?id=1" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            </table>

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
                <div class="mb-3">
                    <label for="roles" class="form-label">Roles</label>
                    <select class="form-control" id="roles" name="roles[]" multiple required>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="user">Usuario</option>
                    </select>
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
                <div class="mb-3">
                    <label for="roles" class="form-label">Roles</label>
                    <select class="form-control" id="roles" name="roles[]" multiple required>
                        <option value="admin" selected>Admin</option>
                        <option value="editor">Editor</option>
                        <option value="user" selected>Usuario</option>
                    </select>
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