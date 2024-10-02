<?php
session_start();
session_destroy(); 
echo "La sesión ha sido cerrada. Contador restablecido.";
echo "<br><a href='principal.php'>Volver a la página principal</a>";
?>