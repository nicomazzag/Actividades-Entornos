<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador</title>
</head>
<body>
    <h1>Bienvenido al simulador de periodico</h1>
    <form style="text-align: center;" action="Inicio.php" method="post">
        <label for="">Eliga su preferencia:</label><br>
        <input type="radio" name="titular" value="Deportes">Deportes<br>
        <input type="radio" name="titular" value="Politica">Politica<br>
        <input type="radio" name="titular" value="Economia">Economia<br>
        <input type="submit" value="Enviar">
    </form>
    <div style="text-align: center; margin-top: 10px;">
        <a href="borrar_cookies.php">Borrar preferencia</a>
    </div>
</body>
</html>

<?php
    if(isset($_POST['titular'])){
        setcookie('titular', $_POST['titular'], time() + 3600);
        $titular = $_POST['titular'];
    } else{
        if(isset($_COOKIE['titular'])){
            $titular = $_COOKIE['titular'];
        }
    }
?>


