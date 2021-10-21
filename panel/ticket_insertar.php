<?php header("Location:tickets.php"); include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<?php    
$fecha = date("Y-m-d");
$ultima = date("Y-m-d");
$usuario = $_SESSION['usuario'];
$asunto = $_GET['asunto'];
$descripcion = $_GET['descripcion'];
$prioridad = $_GET['prioridad'];
$ticket = aleimg($long = 6, $letras_min = false);

$estado = "pendiente";

mysql_query("insert into tickets values (
'', 
'$ticket', 
'$estado', 
'$fecha', 
'$ultima', 
'$usuario', 
'$asunto', 
'$descripcion', 
'$prioridad');
");	
?>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>