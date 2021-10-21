<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
	
  
	<p>Hola <?php echo $_SESSION['usuario'] ?> Bienvenido a la versión Beta de nuestro panel de control, desde aquí podrás envíar noticias y reportes viales.</p>
    <p></p>


	

    
    <h3>Noticias</h3>

    <h6>8 de febrero de 2016</h6>
    <p>Se llevó acabo la presentación de NezApp ante las direcciones del ayuntamiento.</p>

    
    
    
	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>