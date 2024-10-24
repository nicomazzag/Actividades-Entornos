<?php
session_start();

session_unset();

session_destroy();

header("Location: nombre_usuario.php");
exit();
