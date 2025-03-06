<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var(trim($_POST["mensaje"]), FILTER_SANITIZE_STRING);

    if (empty($nombre) || empty($email) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Datos inválidos.";
        exit;
    }

    $destino = "tuemail@example.com"; // Cambia esto a tu correo real
    $asunto = "Nuevo mensaje de contacto";
    $contenido = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";
    $cabeceras = "From: $email";

    if (mail($destino, $asunto, $contenido, $cabeceras)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Acceso denegado.";
}
?>
