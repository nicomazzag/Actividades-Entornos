
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Eliga su tema preferido:</h1>
    <form action="Ejercicio_1.php" method="post">
        <label for="tema">Tema:</label>
        <select name="tema" id="tema">
            <option value="claro">Claro</option>
            <option value="oscuro">Oscuro</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    if(isset($_POST['tema'])){
        $tema= $_POST['tema'];
        setcookie('tema', $tema, time() + 3600);
    } else{
        if(isset($_COOKIE['tema'])){
            $tema= $_COOKIE['tema'];
            echo '<link rel="stylesheet" type="text/css" href="'.$tema.'.css">';  
        } else{
            $tema= 'claro';
        }
    }
?>