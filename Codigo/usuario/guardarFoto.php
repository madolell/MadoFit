<?php
session_start();

// Verificar si se ha iniciado sesión y se tiene un ID de usuario válido
if (isset($_SESSION['id_usuario'])) {
    // Obtener el ID de usuario de la sesión
    $idUsuario = $_SESSION['id_usuario'];

    // Obtener los datos enviados por el formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $provincia = $_POST['provincia'];
    $poblacion = $_POST['poblacion'];

    // Realizar la actualización en la base de datos
    $conexion = mysqli_connect("localhost", "debianDB", "debianDB", "MadoFit");

    // Verificar la conexión
    if (mysqli_connect_errno()) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
        exit();
    }

    // Actualizar los campos en la tabla usuarios
    $query = "UPDATE usuarios SET ";

    $actualizacionRealizada = false; // Variable para verificar si se ha realizado alguna actualización

    if (!empty($nombre)) {
        $query .= "nombre = '$nombre', ";
        $actualizacionRealizada = true;
    }

    if (!empty($apellidos)) {
        $query .= "apellidos = '$apellidos', ";
        $actualizacionRealizada = true;
    }

    if (!empty($fechaNacimiento)) {
        $query .= "fecha_nacimiento = '$fechaNacimiento', ";
        $actualizacionRealizada = true;
    }

    if (!empty($altura)) {
        $query .= "altura = '$altura', ";
        $actualizacionRealizada = true;
    }

    if (!empty($peso)) {
        $query .= "peso = '$peso', ";
        $actualizacionRealizada = true;
    }

    if (!empty($provincia)) {
        $query .= "provincia = '$provincia', ";
        $actualizacionRealizada = true;
    }

    if (!empty($poblacion)) {
        $query .= "poblacion = '$poblacion', ";
        $actualizacionRealizada = true;
    }

    // Eliminar la coma y el espacio sobrantes al final de la consulta
    $query = rtrim($query, ", ");

    // Verificar si se ha realizado alguna actualización antes de ejecutar la consulta
    if ($actualizacionRealizada) {
        $query .= " WHERE id_usuario = $idUsuario";

        if (mysqli_query($conexion, $query)) {
            echo "Los cambios se han guardado correctamente.";
            // Redirigir a perfil.php
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al guardar los cambios: " . mysqli_error($conexion);
        }
    } else {
        echo "No se han realizado cambios en los campos.";
    }

    // Procesar la imagen de perfil
    if (isset($_FILES['imagen_perfil'])) {
        $file = $_FILES['imagen_perfil'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];

        if ($fileError === UPLOAD_ERR_OK) {
            $destination = 'uploads/' . $fileName;
            if (move_uploaded_file($fileTmpName, $destination)) {
                // Actualizar el campo imagen_perfil en la base de datos
                $query = "UPDATE usuarios SET imagen_perfil = '$destination' WHERE id_usuario = $idUsuario";
                if (mysqli_query($conexion, $query)) {
                    echo "La imagen de perfil se ha guardado correctamente.";
                } else {
                    echo "Error al guardar la imagen de perfil en la base de datos: " . mysqli_error($conexion);
                }
            } else {
                echo "Error al mover el archivo de imagen.";
            }
        } else {
            echo "Error al subir la imagen de perfil: " . $fileError;
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Acceso no autorizado.";
}
?>
