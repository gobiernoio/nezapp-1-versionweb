<?php 
// Estas funciones obtienen datos de la página
function unica($campo, $tabla, $filtra, $param) {
$info_query = "select $campo from $tabla where $filtra = '$param'";
$result_nombre = mysql_query($info_query);
$nombre = mysql_fetch_assoc($result_nombre);
echo  $nombre[$campo];
}
// Esta funcion convierte una fecha al español
function fecha_esp($fecha) {
setlocale(LC_ALL,"es_ES.utf8","es_ES.utf8","esp");
$diasemana = strftime("%A", strtotime($fecha));
$diames = strftime("%d", strtotime($fecha));
$mes = strftime("%B", strtotime($fecha));
$anio = strftime("%Y", strtotime($fecha));
echo $diasemana.", ".$diames." de ".$mes." de ".$anio;
}
// Esta funcion crea un dato aleatorio
function aleimg ($long = 9, $letras_min = true, $letras_max = true, $num = true) {
$salt = $letras_min?'abchefghknpqrstuvwxyz':'';
$salt .= $letras_max?'ACDEFHKNPRSTUVWXYZ':'';
$salt .= $num?(strlen($salt)?'2345679':'0123456789'):'';
if (strlen($salt) == 0) { return ''; }
$i = 0;
$str = '';
srand((double)microtime()*1000000);
while ($i < $long) {
$num = rand(0, strlen($salt)-1);
$str .= substr($salt, $num, 1);
$i++; }
return $str; }

// Esta funcion crea un select a partir de una tabla
function get_select($tabla, $campo, $name)
{
	$sql = "SELECT * FROM $tabla order by $campo";
	$result = mysql_query($sql);

	if ($row = mysql_fetch_array($result)){
		echo  "<select name=".$name.">";
	do {
	echo    "<option>".$row[$campo]."</option>";
	}
	while ($row = mysql_fetch_array($result));
	echo  "</select>";
	}
}

// Esta funcion corta una cadena a cierto tamaño especificado
function cut_string($string, $charlimit)
{
if(substr($string,$charlimit-1,1) != ' ' && substr($string,$charlimit-1,1) > 40)
{
$string = substr($string,'0',$charlimit);
$array = explode(' ',$string);
array_pop($array);
$new_string = implode(' ',$array);
return $new_string.' ...';
}
else
{ 
return substr($string,'0',$charlimit-1).'';
}
}

?>
