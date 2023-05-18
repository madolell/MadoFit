<?php
// Obtener los datos del usuario de la base de dato

$email = $_SESSION["email"];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron datos del usuario
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Obtener los campos necesarios del usuario
    $nombre = $row["nombre"];
    $apellidos = $row["apellidos"];
    $fechaNacimiento = $row["fecha_nacimiento"];
    $altura = $row["altura"];
    $peso = $row["peso"];
    $provincia = $row["provincia"];
    $poblacion = $row["poblacion"];
    $imagenPerfil = $row["imagen_perfil"];
}

$stmt->close();
$conn->close();
