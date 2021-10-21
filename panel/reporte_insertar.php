<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<?php    

$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

date_default_timezone_set("America/Mexico_City");
$fecha = date('H:i:s m/d/Y', time());

?>


<script>
	var getVialidad = new Firebase('https://nezapp.firebaseio.com/vialidad/');
	//$scope.vialidad = $firebaseArray(getVialidad.orderByChild("orden"));
	//$scope.vialidad = $firebaseArray(getVialidad);

	//var makeFecha = $filter('date')(new Date(), 'hh:mm dd/MM/yy');
	//var makeFecha = Date.now();
	var makeFecha = "<?php echo $fecha ?>";

	timePositive = Date.now();
	timeNegative = timePositive - ( timePositive * 2 );
	console.log( timeNegative );

	getVialidad.push({
	orden: timeNegative, 
	titulo: "<?php echo $titulo; ?>", 
	fecha: makeFecha, 
	noticia: "<?php echo $mensaje; ?>"
	});
</script>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>