<?php session_start();
header("Location: index.php");


$usuario = $_POST['usuario'];
$password = $_POST['password'];
$tabla_usuarios = "app_usuarios";



if($_POST['usuario']&&$_POST['password']){
	
	//$result = mysql_query("select usuario, password from ".$tabla_usuarios." where usuario = '$usuario'");
	//$fila = mysql_fetch_assoc($result);
	
	$muser = "admin"; $mpwd  = "juanhugo2016";
	
		if($mpwd == $password)
		{
		$_SESSION['usuario'] = $muser;
		echo "ENTRO BIEN";
		}
		else {
		echo "Password Equivocado";
		}
} else {echo "Falta algún dato";}


?>