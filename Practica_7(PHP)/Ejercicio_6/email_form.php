<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Email</title>
</head>
<body>
    <h1>Ingrese su Email</h1>
    <form action="procesar_email.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
