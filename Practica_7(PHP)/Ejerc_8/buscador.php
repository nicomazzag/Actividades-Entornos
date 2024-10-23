<?php
    include("baseDeDatos.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $pal = $_POST['Palabra'];
        if($pal){
            $consulta = "SELECT * FROM buscador WHERE canciones LIKE '%$pal%'";
            $resultado = mysqli_query($conn, $consulta);
            $numeroFilas = mysqli_num_rows($resultado);
            if($numeroFilas == "0") {
                echo "No hay resultados respecto a la palabra que busca.";
            } 
            else {
                echo "<center><strong>RESULTADOS DE BUSQUEDA</strong></center><br>";
                while($fila = mysqli_fetch_assoc($resultado)) 
                {
    ?>
        <table style="border: 1px solid black;">          
            <tr>
                <td colspan="5"><?php echo ($fila['canciones']); ?></td>
            </tr>
        </table>
    <?php                 }            }
        }else{
            echo "<form name='FormBuscador' method='post' action=''><input name='Palabra' type='text'
            id='Palabra'><input type='submit' name='Submit' value='Buscar!'></form>";
        }
    ?>
    <p><a href="FormBuscador.html">Volver al Buscador; de Canciones</a></p>  

</body>
</html>