<?php
    $db_server = "localhost";  // Servidor
    $user = "root";            // Usuario
    $password = "";            // Contraseña vacía
    $database = "prueba";       // Nombre de la base de datos

    $conn = mysqli_connect($db_server, $user, $password, $database);

    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    
?> 