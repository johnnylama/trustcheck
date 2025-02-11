<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo inválido";
        exit();
    }

    $to = "johnnylama92@gmail.com"; // Cambia esto por el correo donde recibirás los mensajes
    $subject = "Nuevo mensaje de contacto";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Nombre: $name\nCorreo: $email\nMensaje:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Correo enviado correctamente";
    } else {
        echo "Error al enviar el correo";
    }
} else {
    echo "Acceso no permitido";
}
?>
