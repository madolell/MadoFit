<?php
session_start();

// Verificar si se ha iniciado sesión y se tiene un ID de usuario válido
if (isset($_SESSION['id_usuario'])) {
  // Obtener el ID de usuario de la sesión
  $idUsuario = $_SESSION['id_usuario'];

  // Verificar si se envió una imagen
  if (isset($_FILES['imagen_perfil'])) {
    // Obtener la información del archivo enviado
    $file = $_FILES['imagen_perfil'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];

    // Mover el archivo a una ubicación permanente
    $destination = '../uploads/' . $fileName;
    if (move_uploaded_file($fileTmpName, $destination)) {
      // Actualizar el campo imagen_perfil en la base de datos
      $conexion = mysqli_connect("localhost", "root", "", "ejemplo");
      $nombreArchivo = mysqli_real_escape_string($conexion, $fileName);
      $query = "UPDATE usuarios SET imagen_perfil = '$nombreArchivo' WHERE id = $idUsuario";
      mysqli_query($conexion, $query);

      // Verificar si la actualización fue exitosa
      if (mysqli_affected_rows($conexion) > 0) {
        echo "La foto de perfil se ha actualizado correctamente.";
      } else {
        echo "Hubo un error al actualizar la foto de perfil en la base de datos.";
      }

      // Cerrar la conexión a la base de datos
      mysqli_close($conexion);
    } else {
      echo "Hubo un error al subir la foto de perfil.";
    }
  } else {
    echo "No se ha seleccionado ninguna foto de perfil.";
  }
} else {
  echo "Acceso no autorizado.";
}
?>
