<?php
session_start();
include("../Auxiliares/conecta.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
    header('Location: ../formulario/login.php'); // Redirigir al usuario a la página de inicio de sesión
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
        /* Estilos adicionales */
        .table img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="text-bg-dark">
    <div class="container ">
        <h2 class="text-center pt-5">Panel de Administración</h2>
        <div class="d-flex justify-content-end pb-3">
            <a href="../Auxiliares/logout.php" class="text-decoration-none">
            <button type="button" class="btn btn-sm btn-outline-danger me-2 rounded-3 d-flex align-items-center">
                <i class="bi bi-box-arrow-in-right me-1"></i>Cerrar sesion
            </button>
        </div>
        <!-- Contenido adicional del panel de administración -->
        <div class="container mb-5">
            <h2 class="text-center text-bg-light rounded">Lista de usuarios</h2>
            <div class="table-responsive shadow">
                <table class="table table-dark table-hover">
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
                                echo "<div class='btn-group' role='group'>";
                                echo "<a href='create_user.php?id=" . $row['id_usuario'] . "' class='btn btn-success btn-sm'>Crear</a>";
                                echo "<a href='edit_user.php?id=" . $row['id_usuario'] . "' class='btn btn-primary btn-sm'>Editar</a>";
                                echo "<a href='delete_user.php?id=" . $row['id_usuario'] . "' class='btn btn-danger btn-sm'>Eliminar</a>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // No se encontraron usuarios
                            echo "<tr><td colspan='12'>No se encontraron usuarios.</td></tr>";
                        }

                        // Liberar los recursos de la consulta
                        $result->free();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mb-5">
            <h2 class="text-center text-bg-light rounded">Lista de estadisticas</h2>
            <div class="table-responsive shadow">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Calorias Quemadas</th>
                            <th>Masa Muscular</th>
                            <th>ID Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Realizar la consulta a la base de datos para obtener las estadisticas
                        $sql = "SELECT * FROM estadisticas";
                        $result = $conn->query($sql);

                        // Verificar si se encontraron estadisticas
                        if ($result->num_rows > 0) {
                            // Iterar sobre los resultados y generar las filas de la tabla
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_estadisticas'] . "</td>";
                                echo "<td>" . $row['fecha'] . "</td>";
                                echo "<td>" . $row['calorias_quemadas'] . "</td>";
                                echo "<td>" . $row['masa_muscular'] . "</td>";
                                echo "<td>" . $row['id_usuario'] . "</td>";
                                echo "<td>";
                                echo "<div class='btn-group' role='group'>";
                                echo "Proximamente";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // No se encontraron estadisticas
                            echo "<tr><td colspan='7'>No se encontraron estadisticas.</td></tr>";
                        }

                        // Liberar los recursos de la consulta
                        $result->free();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <h2 class="text-center text-bg-light rounded">Lista de ejercicios</h2>
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Grupo Muscular</th>
                            <th>Equipo Necesario</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Realizar la consulta a la base de datos para obtener los ejercicios
                        $sql = "SELECT * FROM ejercicios";
                        $result = $conn->query($sql);

                        // Verificar si se encontraron ejercicios
                        if ($result->num_rows > 0) {
                            // Iterar sobre los resultados y generar las filas de la tabla
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_ejercicio'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";
                                echo "<td>" . $row['descripcion'] . "</td>";
                                echo "<td>" . $row['grupo_muscular'] . "</td>";
                                echo "<td>" . $row['equipo_necesario'] . "</td>";
                                echo "<td style='width: 200px;'><img src='../fotos/Ejercicios/" . $row['grupo_muscular'] . "/" . $row['imagen'] . "' class='img-fluid'></td>";
                                echo "<td class=''>";
                                echo "<div class='btn-group' role='group'>";
                                echo "<a href='create_ejercicio.php?id=" . $row['id_ejercicio'] . "' class='btn btn-success btn-sm'>Crear</a> ";
                                echo "<a href='edit_ejercicio.php?id=" . $row['id_ejercicio'] . "' class='btn btn-primary btn-sm'>Editar</a> ";
                                echo "<a href='delete_ejercicio.php?id=" . $row['id_ejercicio'] . "' class='btn btn-danger btn-sm'>Eliminar</a>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // No se encontraron ejercicios
                            echo "<tr><td colspan='7'>No se encontraron ejercicios.</td></tr>";
                        }

                        // Liberar los recursos de la consulta
                        $result->free();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Scripts JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>