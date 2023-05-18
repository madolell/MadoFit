<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $nombre = $_POST['your-name'];
    $apellidos = $_POST['your-surname'];
    $email = $_POST['your-email'];
    $asunto = $_POST['your-subject'];
    $mensaje = $_POST['your-message'];

    // Configurar los detalles del correo electrónico
    $to = '44684@a.iesleopoldoqueipo.com'; // Dirección de correo electrónico 
    $subject = 'Nueva solicitud de contacto: ' . $asunto;
    $message = "Nombre: $nombre\nApellidos: $apellidos\nCorreo electrónico: $email\nMensaje:\n$mensaje";

    // Enviar el correo electrónico
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "¡La solicitud se ha enviado correctamente!";
    } else {
        echo "Error al enviar la solicitud.";
    }
}
?>
