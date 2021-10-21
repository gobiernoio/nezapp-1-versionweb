<?php
/*

$servidor = "localhost";
$user = "root";
$password = "";
$base = "panel_nezapp";

*/



$servidor = "localhost";
$user = "revistg4_jh";
$password = "meganI0605";
$base = "revistg4_nezapp";

$con = mysql_connect($servidor, $user, $password)
or die("no se pudo conectar con el servidor");

mysql_select_db($base, $con)
or die("No se pudo conectar a la base de datos");


?>