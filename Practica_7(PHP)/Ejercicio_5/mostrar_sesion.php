<?php
session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
    echo "<h1>Datos de la sesión:</h1>";    // muestra valores de la sesion
    echo "<p><strong>Usuario:</strong> " . $_SESSION['usuario'] . "</p>";
    echo "<p><strong>Clave:</strong> " . $_SESSION['clave'] . "</p>";
} else {
    echo "<p>No hay datos de sesión disponibles. Por favor, vuelva a ingresar sus datos.</p>";
}

echo '<br><a href="eliminar_sesion.php">Cerrar sesión</a>';
?>
