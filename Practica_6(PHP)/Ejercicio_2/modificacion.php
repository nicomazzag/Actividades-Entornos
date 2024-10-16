<?php
$link = mysqli_connect("localhost", "root", "") or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "capitales") or die("Error al seleccionar la base de datos");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_POST['buscar']) && !isset($_POST['modificar'])) {
?>
    <html>
    <head>
        <title>Buscar Ciudad para Modificar</title>
    </head>
    <body>
        <h1>Modificar Ciudad</h1>
        <form action="modificacion.php" method="POST">
            <label>Nombre de la Ciudad: <input type="text" name="ciudad" required></label><br><br>
            <input type="submit" name="buscar" value="Buscar Ciudad">
        </form>
        <a href="menu.php">Volver al Menú</a>
    </body>
    </html>
<?php
}

if (isset($_POST['buscar'])) {
    $ciudad = $_POST['ciudad'];

    $vSql = "SELECT * FROM ciudades WHERE ciudad = '$ciudad'";
    $vResultado = mysqli_query($link, $vSql);

    if (mysqli_num_rows($vResultado) == 0) {
        echo "La ciudad no existe.";
        echo "<br><a href='modificacion.php'>Volver a Intentar</a>";
    } else {
        // Si se encuentra la ciudad, obtener los datos
        $fila = mysqli_fetch_assoc($vResultado);
?>
        <html>
        <head>
            <title>Modificar Ciudad</title>
        </head>
        <body>
            <h1>Modificar Ciudad: <?php echo $fila['ciudad']; ?></h1>
            <form action="modificacion.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                <label>Ciudad: <input type="text" name="ciudad" value="<?php echo $fila['ciudad']; ?>"></label><br>
                <label>País: <input type="text" name="pais" value="<?php echo $fila['pais']; ?>"></label><br>
                <label>Habitantes: <input type="number" name="habitantes" value="<?php echo $fila['habitantes']; ?>"></label><br>
                <label>Superficie: <input type="number" step="0.01" name="superficie" value="<?php echo $fila['superficie']; ?>"></label><br>
                <label>Tiene Metro:
                    <select name="tieneMetro">
                        <option value="1" <?php if ($fila['tieneMetro'] == 1) echo "selected"; ?>>Sí</option>
                        <option value="0" <?php if ($fila['tieneMetro'] == 0) echo "selected"; ?>>No</option>
                    </select>
                </label><br><br>
                <input type="submit" name="modificar" value="Modificar Ciudad">
            </form>
            <a href="menu.php">Volver al Menú</a>
        </body>
        </html>
<?php
    }
}

// Etapa 3: Procesar el formulario de modificación
if (isset($_POST['modificar'])) {
    // Captura de los datos modificados
    $id = $_POST['id'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = $_POST['tieneMetro'];

    // Actualizar los datos en la base de datos
    $vSql = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";
    $resultado = mysqli_query($link, $vSql);

    if ($resultado) {
        echo "Ciudad modificada correctamente.";
    } else {
        echo "Error al modificar la ciudad: " . mysqli_error($link);
    }

    // Cerrar la conexión
    mysqli_close($link);

    // Enlace para volver al menú
    echo "<br><a href='menu.php'>Volver al Menú</a>";
}
?>
