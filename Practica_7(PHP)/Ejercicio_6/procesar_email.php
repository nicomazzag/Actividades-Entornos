<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "base2");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$email = $_POST['email'];

$sql = "SELECT nombre FROM alumnos WHERE mail = '$email'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $nombre = $fila['nombre'];
    
    $_SESSION['nombre'] = $nombre;

    echo "¡Bienvenido, $nombre! Su email ha sido verificado.";
    echo '<br><a href="verificar_sesion.php">Ir a la página de bienvenida</a>';
} else {
    echo "El email ingresado no existe en la base de datos.";
    echo '<br><a href="email_form.php">Volver a intentar</a>';
}

mysqli_close($conexion);
?>
