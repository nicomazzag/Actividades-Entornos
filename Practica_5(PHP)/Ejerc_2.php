<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Ejerc_2.css">
    <title>Contactanos</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="mb-3">
            <label for="Usuario" class="form-label">Email:</label>
            <input type="email" class="form-control"  name="Usuario" id="Usuario" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3"></textarea>
        </div>
            <div class="mb-3">
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>
    </form>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_input(INPUT_POST, 'Usuario', FILTER_VALIDATE_EMAIL);
    $cuerpo= filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_STRING);
    }

    $asunto = "Consulta";
    $destinatario = "xx@xx.com ";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: $email' . "\r\n";
    $headers .= 'Reply-To: $email' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
        


    if(mail($destinatario, $asunto, $cuerpo, $headers)){
        echo "Correo enviado";
    } else {
        echo "Error al enviar el correo";
    }
?>

