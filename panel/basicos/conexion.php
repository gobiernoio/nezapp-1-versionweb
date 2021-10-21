<?php
/*
$servidor = "localhost";
$usuario = "hmadmin";
$password = "MegI1982";
$base = "hmedia";
*/

$servidor = "mysql508.ixwebhosting.com";
$usuario = "C267637_user";
$password = "MegI1982";
$base = "C267637_apps";


$con = mysql_connect($servidor, $usuario, $password)
or die("no se pudo conectar con el servidor");

mysql_select_db($base, $con)
or die("No se pudo conectar a la base de datos");
?>