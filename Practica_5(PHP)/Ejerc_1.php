<?php //Suponiendo que estamos recibiendo los datos de un formulario
    if(isset($_POST['enviar'])){ // "enviar" es el atributo name del boton de envio del formulario
        if(!empty($_POST['mail']) && !empty($_POST['descripcion'])){
            $fecha=date("d-m-Y");
            $hora= date("H :i:s");
            $mail = $_POST['mail'];
            $descrip = $_POST['descripcion'];
            $asunto = "Problema/Asunto del usuario";
            $descripcion= '
            <!DOCTYPE html>
            <head>
                <title>Envio de mail</title>
            </head>
            <body><p> Enviado:' + $fecha + ' - ' + $hora + "\n" + 'Descripción' + $descrip + '</p></body></html>';
            $header = "MIME-Version: 1.0" ."\r\n";
            $header .= "Content-type: text/html; charset=utf-8" ."\r\n"; 
            $header .= "From: mailServidor@gmail.com" ."\r\n";
            $header.= "Reply-To: mailCreadorPagina@gmail.com" ."\r\n"; //dirección de respuesta distinta que la del remitente
            $mail = @mail($mail, $asunto, $descripcion, $header);
            if($mail){
                echo "<h4>¡Mail enviado correctamente!</h4>";
            }
        }
    }
?>