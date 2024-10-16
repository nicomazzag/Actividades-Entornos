<?php
$link = mysqli_connect("localhost", "root", "") or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "capitales") or die("Error al seleccionar la base de datos");

$cant_por_pag = 5;  
$pepe = 1 == $a ? 3 : 4;
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$inicio = ($pagina - 1) * $cant_por_pag;

$vSql = "SELECT * FROM ciudades";
$vResultado = mysqli_query($link, $vSql);
$total_registros = mysqli_num_rows($vResultado);

$total_paginas = ceil($total_registros / $cant_por_pag); // ceil : redondea para arriba

echo "Número de registros encontrados: $total_registros<br>";
echo "Se muestran páginas de $cant_por_pag registros cada una.<br>";
echo "Mostrando la página $pagina de $total_paginas.<br><br>";

$vSql = "SELECT * FROM ciudades LIMIT $inicio, $cant_por_pag";
$vResultado = mysqli_query($link, $vSql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Ciudad</th><th>País</th><th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th></tr>";

while ($fila = mysqli_fetch_assoc($vResultado)) {
    echo "<tr>";
    echo "<td>" . $fila['id'] . "</td>";
    echo "<td>" . $fila['ciudad'] . "</td>";
    echo "<td>" . $fila['pais'] . "</td>";
    echo "<td>" . $fila['habitantes'] . "</td>";
    echo "<td>" . $fila['superficie'] . "</td>";
    echo "<td>" . ($fila['tieneMetro'] ? "Sí" : "No") . "</td>";
    echo "</tr>";
}

echo "</table><br>";

for ($i = 1; $i <= $total_paginas; $i++) {
    if ($pagina == $i) {
        echo "$i ";  
    } else {
        echo "<a href='Listado_pag.php?pagina=$i'>$i</a> ";  
    }
}

mysqli_free_result($vResultado);
mysqli_close($link);
?>
<html>
<body>
    <br>
    <a href="menu.php">Volver al Menú</a>
</body>
</html>
