<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de visitas</title>
</head>
<body>
    <h1>Hola!</h1>
    <p>
        <?php
        if (isset($_COOKIE['contador'])){
            
            $contador = $_COOKIE['contador'] +1;

            echo "Nos alegra que vuelvas a nuestra pagina por $contador a vez";

        } else {

            $contador = 1;

            echo "Bienvenido a nuestro sitio! <br> Nos alegra que ingreses por primera vez al sitio.";
        }
        setcookie('contador', $contador, time() + 3600*24*365);

        ?>
    </p>
</body>
</html>
