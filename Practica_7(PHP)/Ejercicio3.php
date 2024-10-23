<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>identificador</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST'){

        $nombre = $_POST['nombre'];
        setcookie('nombre', $_POST['nombre'], time()+3600*24*365);

    } else {
        if (isset($_COOKIE['nombre'])){
            //$nombre = $_COOKIE['nombre'];
            extract($_COOKIE);
            }
        }

    if (isset($nombre)){
            echo "<h1>Hola, $nombre</h1>";

            echo "<p>Puede cambiar su nombre aqui:</p>";
        } else {

            echo "<h1>Bienvenido</h1>";

            echo "<p>Por favor, ingrese su nombre</p>";
        }
    
    //setcookie('nombre', $nombre, time() + 3600*24*365);
    ?>
    <form method="post" action="">
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre">
    </form>
</body>
</html>
<?php

?>
