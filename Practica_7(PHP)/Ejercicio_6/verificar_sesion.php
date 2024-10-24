<?php
session_start();

if (isset($_SESSION['nombre'])) {
    echo "<h1>Bienvenido, " . $_SESSION['nombre'] . "!</h1>";
} else {
    echo "<h1>No tiene permiso para acceder a esta página.</h1>";
}
echo '<br><a href="email_form.php">Volver al inicio</a>';
