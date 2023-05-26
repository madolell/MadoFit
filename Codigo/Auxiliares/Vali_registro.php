<?php
// Verificar si se envió el formulario
if ($_POST) {
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $repeatPassword = isset($_POST['repeat-password']) ? $_POST['repeat-password'] : '';
    $fechaNacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
    $peso = isset($_POST['peso']) ? $_POST['peso'] : '';
    $altura = isset($_POST['altura']) ? $_POST['altura'] : '';
    $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
    $poblacion = isset($_POST['poblacion']) ? $_POST['poblacion'] : '';

    // Validar que las contraseñas coincidan
    if ($password !== $repeatPassword) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

     // Cifrar la contraseña 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Conexión a la base de datos
    $localhost = 'localhost';
    $usuario = 'debianDB';
    $dbPassword = 'debianDB';
    $database = 'MadoFit';

    $conexion = mysqli_connect($localhost, $usuario, $dbPassword, $database);

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Escapar los datos para evitar inyección SQL
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellidos = mysqli_real_escape_string($conexion, $apellidos);
    $email = mysqli_real_escape_string($conexion, $email);
    $password = mysqli_real_escape_string($conexion, $password);
    $fechaNacimiento = mysqli_real_escape_string($conexion, $fechaNacimiento);
    $peso = mysqli_real_escape_string($conexion, $peso);
    $altura = mysqli_real_escape_string($conexion, $altura);
    $provincia = mysqli_real_escape_string($conexion, $provincia);
    $poblacion = mysqli_real_escape_string($conexion, $poblacion);

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, fecha_nacimiento, peso, altura, provincia, poblacion)
            VALUES ('$nombre', '$apellidos', '$email', '$hashedPassword', '$fechaNacimiento', '$peso', '$altura', '$provincia', '$poblacion')";

    if (mysqli_query($conexion, $sql)) {
        echo "Usuario registrado exitosamente.";
        // Redireccionar al usuario a "inicio.php"
        header("Location: ../formulario/login.php");
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
