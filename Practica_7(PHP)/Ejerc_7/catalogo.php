<?php 
ob_start("ob_gzhandler"); 
session_start(); 
include("baseDeDatos.php");
if(isset($_SESSION['carro'])) 
$carro=$_SESSION['carro'];else $carro=false; 
//y hacemos la consulta 
$qry="SELECT * FROM catalogo ORDER BY producto ASC";
$resultado = mysqli_query($conn, $qry);
?> 
<html> 
<head> 
<title>CAT&Aacute;LOGO</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<style type="text/css">  
.catalogo { 
 font-family: Verdana, Arial, Helvetica, sans-serif; 
 font-size: 9px; 
 color: #333333; 
} 
</style> 
</head> 
<body> 
<table width="272" style="text-align: center;" cellpadding="0" cellspacing="0" style="border: 1px 
solid #000000;"> 
 <tr valign="middle" bordercolor="#FFFFFF" style="background-color: #DFDFDF;"  class="catalogo"> 
 <td width="170"><strong>Producto</strong></td> 
 <td width="77"><strong>Precio</strong></td> 
 <td width="25" style="text-align: right;"><a href="vercarrito.php?<?php echo SID ?>" 
title="Ver el contenido del carrito"><img src="" width="25" height="21" 
style="border: 0;"></a></td> 
 </tr> 
 <?php
  while($row = mysqli_fetch_assoc($resultado)){ 
    ?> 
    <tr valign="middle" class="catalogo"> 
    <td><?php echo $row['producto'] ?></td> 
    <td><?php echo $row['precio'] ?></td> 
    <td style="text-align: center;"><?php 
    if(!$carro || !isset($carro[md5($row['id'])]['identificador']) || $carro[md5($row['id'])]['identificador']!=md5($row['id'])){ 
    ?><a href="agregacar.php?<?php echo SID ?>&id=<?php echo $row['id']; 
    ?>"><img src="" style="border: 0;" title="Agregar al 
    Carrito"></a><?php } 
     else{?><a href="borracar.php?<?php echo SID ?>&id=<?php echo $row['id']; 
        ?>"><img src="productoagregado.gif" style="border: 0;" title="Quitar del Carrito"></a><?php 
        } ?></td> 
         </tr><?php } ?> 
        </table> 
        </body> 
        </html> 
        <?php 
        ob_end_flush(); 
        ?>