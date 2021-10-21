<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<?php    

$titulo = $_POST['titulo'];
$imagen = $_POST['imagen'];
$enlace = $_POST['enlace'];
$nota = $_POST['nota'];

date_default_timezone_set("America/Mexico_City");
$fecha = date('m/d/Y', time());

?>


<script>
	var getNoticias = new Firebase('https://nezapp.firebaseio.com/noticias/');
	//$scope.vialidad = $firebaseArray(getNoticias.orderByChild("orden"));
	//$scope.vialidad = $firebaseArray(getNoticias);

	//var makeFecha = $filter('date')(new Date(), 'hh:mm dd/MM/yy');
	//var makeFecha = Date.now();
	var makeFecha = "<?php echo $fecha ?>";

	timePositive = Date.now();
	timeNegative = timePositive - ( timePositive * 2 );
	console.log( timeNegative );

	getNoticias.push({
	orden: timeNegative, 
	titulo: "<?php echo $titulo; ?>", 
	imagen: "<?php echo $imagen; ?>", 
	enlace: "<?php echo $enlace; ?>", 
	noticia: "<?php echo $nota; ?>", 
	fecha: makeFecha
	});
</script>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>