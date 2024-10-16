<?php
$link = mysqli_connect("localhost", "root", "") or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "capitales") or die("Error al seleccionar la base de datos");


$vSql = "SELECT * FROM ciudades";
$vResultado = mysqli_query($link, $vSql);
?>

<html>
<head>
    <title>Listado Completo de Ciudades</title>
</head>
<body>
    <h1>Listado Completo de Ciudades</h1>
    <table border="1">
        <tr>
            <th>ID</th><th>Ciudad</th><th>País</th><th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($vResultado)) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['ciudad']; ?></td>
            <td><?php echo $fila['pais']; ?></td>
            <td><?php echo $fila['habitantes']; ?></td>
            <td><?php echo $fila['superficie']; ?></td>
            <td><?php echo ($fila['tieneMetro'] ? "Sí" : "No"); ?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="menu.php">Volver al Menú</a>
</body
