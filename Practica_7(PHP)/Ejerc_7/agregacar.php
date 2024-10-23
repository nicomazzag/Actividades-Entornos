<?php 
session_start(); 
extract($_REQUEST); 
include("baseDeDatos.php"); 
if(!isset($cantidad)){$cantidad=1;}
$qry="SELECT * FROM catalogo WHERE id='".$id."'";
$resultado = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($resultado);
if(isset($_SESSION['carro'])) 
$carro=$_SESSION['carro']; 
$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'producto'=>$row['producto'],'precio'=>$row['precio'],'id'=>$id);
$_SESSION['carro']=$carro; 
header("Location:catalogo.php?".SID); 
?>