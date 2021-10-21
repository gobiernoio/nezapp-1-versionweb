<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<?php    

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];


?>


<script>
	var getDirectorio = new Firebase('https://nezapp.firebaseio.com/directorio/');
	//$scope.vialidad = $firebaseArray(getVialidad.orderByChild("orden"));
	//$scope.vialidad = $firebaseArray(getVialidad);

	//var makeFecha = $filter('date')(new Date(), 'hh:mm dd/MM/yy');
	//var makeFecha = Date.now();
	

	getDirectorio.push({
	nombre: "<?php echo $nombre; ?>", 
	telefono: "<?php echo $telefono; ?>"
	});
</script>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>