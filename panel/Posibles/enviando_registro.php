<?php
session_start();
header("Location: navegar_registros.php");
include_once("conexion.php");
include_once("hmedia/funciones.php");
include_once("hmedia/configuracion.php");

$categoria = $_POST['categoria'];
$publico = $_POST['publico'];
$titulo = $_POST['titulo'];
$fecha = "current_date()";



if($_FILES['imagen']['name']) {

include_once("hmedia/imagen_class.php");

$file_name = aleimg().".jpg";
$picture = new Image;
$thumb = new Image;
$picture->loadImage($_FILES['imagen']['tmp_name']);
$thumb->loadImage($_FILES['imagen']['tmp_name']);

$thumb->resizeH(110);
$picture->resizeH(600);

$thumb->saveImage("../".$carpeta."/thumbs/".$file_name, 75);
$picture->saveImage("../".$carpeta."/".$file_name, 75);

$imagen = $file_name;
}

else $imagen = "0";


$sql = "insert into ".$tabla_fotos." values(
'', 
'$categoria', 
'$publico',  
'$titulo', 
'$imagen',
'$fecha'
);";

mysql_query($sql);
?>