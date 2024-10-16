<?php
$link = mysqli_connect("localhost", "root", "") or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "capitales") or die("Error al seleccionar la base de datos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciudad = $_POST['ciudad'];

    $vSql = "SELECT * FROM ciudades WHERE ciudad='$ciudad'";
    $vResultado = mysqli_query($link, $vSql);

    if (mysqli_num_rows($vResultado) == 0) {
        echo "La ciudad no existe.";
        ?><a href="menu.php">Volver al Menú</a><?php
    } else {
        $vSql = "DELETE FROM ciudades WHERE ciudad='$ciudad'";
        mysqli_query($link, $vSql) or die(mysqli_error($link));
        echo "Ciudad eliminada correctamente.";

        ?><a href="menu.php">Volver al Menú</a><?php
    }

    mysqli_free_result($vResultado);
    mysqli_close($link);
} else {
?>
<html>
<head>
    <title>Baja de Ciudad</title>
</head>
<body>
    <h1>Baja de Ciudad</h1>
    <form action="Baja.php" method="POST">
        <label>Ciudad: <input type="text" name="ciudad" required></label><br>
        <input type="submit" value="Eliminar Ciudad">
    </form>
    <a href="menu.php">Volver al Menú</a>
</body>
</html>
<?php
}
?>
