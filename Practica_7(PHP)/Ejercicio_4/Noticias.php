<?php
    if(isset($_COOKIE['titular'])){
        $titular = $_COOKIE['titular'];
    } 

    if(isset($titular)){
        echo "<h2>La noticia de la seccion de $titular es:</h2>";
        switch($titular){
            case 'Deportes':
                echo "<p>Boca Juniors campeon de la copa libertadores</p>";
                break;
            case 'Politica':
                echo "<p>Aumento de la pobreza</p>";
                break;
            case 'Economia':
                echo "<p>El dolar sube</p>";
                break;
        }
    } else{
        echo "<h2>No hay noticia seleccionada</h2>";
    }
    
?>