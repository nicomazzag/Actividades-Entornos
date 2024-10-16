<?php
$link = mysqli_connect("localhost", "root", "") or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "capitales") or die("Error al seleccionar la base de datos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = $_POST['tieneMetro'];

    $vSql = "SELECT COUNT(*) as total FROM ciudades WHERE ciudad='$ciudad' AND pais='$pais'";
    $vResultado = mysqli_query($link, $vSql);
    $fila = mysqli_fetch_assoc($vResultado);

    if ($fila['total'] > 0) {
        echo "La ciudad ya existe en la base de datos.";
        ?><a href="menu.php">Volver al Menú</a><?php
    } else {
        $vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
                 VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
        mysqli_query($link, $vSql) or die(mysqli_error($link));
        echo "Ciudad agregada correctamente.";
        ?><a href="menu.php">Volver al Menú</a><?php
    }

    mysqli_free_result($vResultado);
    mysqli_close($link);
} else {
?>
<html>
<head>
    <title>Alta de Ciudad</title>
</head>
<body>
    <h1>Alta de Ciudad</h1>
    <form action="Alta.php" method="POST">
        <label>Ciudad: <input type="text" name="ciudad" required></label><br>
        <label>País: <input type="text" name="pais" required></label><br>
        <label>Habitantes: <input type="number" name="habitantes" required></label><br>
        <label>Superficie: <input type="number" step="0.01" name="superficie" required></label><br>
        <label>Tiene Metro: 
            <select name="tieneMetro">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </label><br><br>
        <input type="submit" value="Agregar Ciudad">
    </form>
    <a href="menu.php">Volver al Menú</a>
</body>
</html>
<?php
}
?>
