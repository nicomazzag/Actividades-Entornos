<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendar a un amigo</title>
</head>
<body>
    <h1>Recomienda nuestro sitio a un amigo</h1>
    <form method="post" action="">
        <label for="nombre">Tu nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="email_amigo">Correo de tu amigo:</label><br>
        <input type="email" id="email_amigo" name="email_amigo" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Recibir datos del formulario
    $nombre = ($_POST['nombre']);
    $email_amigo = filter_input(INPUT_POST, 'email_amigo', FILTER_VALIDATE_EMAIL);
    

    //Crear cuerpo
    $asunto = "¡$nombre te recomienda este sitio web!";

    $cuerpo = "Hola,\n\n$nombre te ha recomendado visitar este sitio web.\n\n";
    $cuerpo .= "¡Esperamos que lo disfrutes!\n Saludos,\nEl equipo de nuestro sitio web\n";

    $headers = "From: no-reply@sitioutn.com\r\n";
    $headers .= "Reply-To: no-reply@sitioutn.com\r\n";
    $headers .= "Version: PHP/" . phpversion();

    if (mail($email_amigo, $asunto, $cuerpo, $headers)) {
        echo "\n¡Correo enviado exitosamente!";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
    }
?>


