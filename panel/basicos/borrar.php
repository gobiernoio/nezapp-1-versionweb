<?php session_start(); header("Location: ".$_SERVER['HTTP_REFERER']); include("conexion.php");

if(isset($_SESSION['usuario'])) { 

$id = $_GET['id'];
$tabla = $_GET['tabla'];

$sql = "delete from $tabla where id = $id";
mysql_query($sql);

} else { include("login.php"); }
?>                                                                                           
