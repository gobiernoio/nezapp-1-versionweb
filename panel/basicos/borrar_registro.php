<?php
session_start();
header("Location: navegar_registros.php");
include("conexion.php");
include("hmedia/configuracion.php");
$id = $_GET['id'];
$foto = $_GET['foto'];
$sql = "delete from ".$tabla_fotos." where id = $id";

unlink("../".$carpeta."/thumbs/".$_GET['foto']);
unlink("../".$carpeta."/".$_GET['foto']);

mysql_query($sql);
?>