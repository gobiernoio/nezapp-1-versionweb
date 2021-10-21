<?php
session_start();
header("Location: navegar_registros.php");
include("conexion.php");
include("hmedia/configuracion.php");

$id = $_GET['id'];
$publico = $_GET['publico'];

if($publico==0) $sql = "update ".$tabla_fotos." set publico=1 where id = $id";
else $sql = "update ".$tabla_fotos." set publico=0 where id = $id";
mysql_query($sql);
?>