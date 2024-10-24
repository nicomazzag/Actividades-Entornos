<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Usuario</title>
</head>
<body>
    <h1>Ingrese su Nombre de Usuario y Clave</h1>
    <form action="crear_sesion.php" method="POST">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br><br>

        <label for="clave">Clave:</label>
        <input type="password" name="clave" id="clave" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
