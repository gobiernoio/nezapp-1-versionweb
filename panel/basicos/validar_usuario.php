<?php session_start();
header("Location: index.php");

include("conexion.php");
include("hmedia/configuracion.php");
$usuario = $_POST['usuario'];
$password = $_POST['password'];

if($_POST['usuario']&&$_POST['password']){
	$result = mysql_query("select usuario, password from ".$tabla_usuarios." where usuario = '$usuario'");
	$fila = mysql_fetch_assoc($result);
	
	$muser = $fila['usuario']; $mpwd  = $fila['password'];
	
		if($mpwd == $password)
		{
		$_SESSION['usuario'] = $fila["usuario"];
		echo "ENTRO BIEN";
		}
		else {
		echo "Password Equivocado";
		}
} else {echo "Falta algún dato";}
?>