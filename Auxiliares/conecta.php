<?php
$localhost = "localhost";
$usuario = "root";
$password = "";
$database = "ejemplo";

// Conexión con la base de datos
$conn = new mysqli($localhost, $usuario, $password, $database);

$conexionExitosa = true;
if ($conn->connect_error) {
        $conexionExitosa = false;
    }

// Mostrar mensaje de conexión exitosa
if ($conexionExitosa) {
    echo "Conexión exitosa";
}

?>