<?php
include("hmedia/configuracion.php");

$con = mysql_connect($servidor, $user, $password)
or die("no se pudo conectar con el servidor");

mysql_select_db($base, $con)
or die("No se pudo conectar a la base de datos");
?>