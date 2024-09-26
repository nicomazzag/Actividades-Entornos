


<?php
function comprobar_nombre_usuario($nombre_usuario){
 //compruebo que el tamaño del string sea válido.
 if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
    echo $nombre_usuario . " no es válido<br>";
 return false;
 }
 //compruebo que los caracteres sean los permitidos
 $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789- _";
 for ($i=0; $i<strlen($nombre_usuario); $i++){
    if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
        echo $nombre_usuario . " no es válido<br>";
    return false;
 }
 }
 echo $nombre_usuario . " es válido<br>";
 return true;
}

// Casos de prueba
$usuarios = [
    "user123",        // Válido
    "user-name",      // Válido (guión permitido)
    "us",             // No válido (menos de 3 caracteres)
    "usuario_con_nombre_demasiado_largo", // No válido (más de 20 caracteres)
    "user@name",      // No válido (carácter no permitido)

];

// Probar cada nombre de usuario
foreach ($usuarios as $usuario) {
    comprobar_nombre_usuario($usuario);
}
?>