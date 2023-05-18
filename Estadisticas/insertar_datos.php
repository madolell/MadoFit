<?php
require "../Auxiliares/conecta.php";

$localhost = "localhost";
$usuario = "root";
$password = "";
$database = "ejemplo";

// Conexión con la base de datos
$conn = new mysqli($localhost, $usuario, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se recibieron los datos del formulario
if (isset($_POST['fecha'], $_POST['calorias'], $_POST['masa_muscular'], $_POST['id_usuario'])) {
    // Obtener los valores enviados por el formulario
    $fecha = $_POST['fecha'];
    $calorias = $_POST['calorias'];
    $masa_muscular = $_POST['masa_muscular'];
    $id_usuario = $_POST['id_usuario'];

    // Verificar si los valores no están vacíos
    if (!empty($fecha) && !empty($calorias) && !empty($masa_muscular) && !empty($id_usuario)) {
        // Los valores están presentes y no están vacíos
        // Realiza las operaciones necesarias, como insertar o actualizar los datos en la base de datos
        
        // Verificar si el usuario ya tiene estadísticas registradas
        $query = "SELECT * FROM estadistica WHERE id_usuario = '$id_usuario'";
        $resultado = $conn->query($query);

        if ($resultado->num_rows > 0) {
            // El usuario ya tiene estadísticas registradas, realizar la actualización
            $query = "UPDATE estadistica SET fecha = '$fecha', calorias = '$calorias', masa_muscular = '$masa_muscular' WHERE id_usuario = '$id_usuario'";
        } else {
            // El usuario no tiene estadísticas registradas, realizar la inserción
            $query = "INSERT INTO estadistica (fecha, calorias, masa_muscular, id_usuario) VALUES ('$fecha', '$calorias', '$masa_muscular', '$id_usuario')";
        }
        
        // Ejecutar la consulta y manejar cualquier error
        if ($conn->query($query) === TRUE) {
            echo "Los datos se insertaron o actualizaron correctamente.";
        } else {
            echo "Error al ejecutar la consulta: " . $conn->error;
        }
        
        // Redirigir o mostrar un mensaje de éxito
        
    } else {
        echo "Error: Alguno de los campos del formulario está vacío.";
    }
} else {
    echo "Error: No se recibieron los datos del formulario correctamente.";
}

$conn->close();
