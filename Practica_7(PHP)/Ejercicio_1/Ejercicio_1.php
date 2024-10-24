<?php
if (isset($_POST['estilo'])) {
    setcookie("estilo", $_POST['estilo'], time() + (86400)); //la cookie dura 1 día
    header("Location: " . $_SERVER['PHP_SELF']);
}

if (isset($_COOKIE['estilo'])) {
    $estilo = $_COOKIE['estilo'];
} else {
    $estilo = "claro";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Selección de Estilo</title>

    <?php
    if ($estilo == "claro") {
        echo '<link rel="stylesheet" href="claro.css">';
    } elseif ($estilo == "oscuro") {
        echo '<link rel="stylesheet" href="oscuro.css">';
    } elseif ($estilo == "estilo3") {
        echo '<link rel="stylesheet" href="estilo3.css">';
    }
    ?>
</head>
<body>

<h1> Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, magni ullam! Recusandae in fugiat reprehenderit incidunt, temporibus porro odit labore voluptatum error eum quos, sapiente, quis repellendus? Excepturi, recusandae ipsam.</h1>

<form action="" method="POST">
    <label>Selecciona un estilo:</label><br>
    <input type="radio" name="estilo" value="claro" <?php if ($estilo == 'claro') echo 'checked'; ?>> claro<br>
    <input type="radio" name="estilo" value="oscuro" <?php if ($estilo == 'oscuro') echo 'checked'; ?>> oscuro<br>
    <input type="submit" value="Aplicar Estilo">
</form>

</body>
</html>
