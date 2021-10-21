<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->


   
<form method="post" action="agenda_insertar.php" enctype="multipart/form-data">

<h4>Crear nuevo reporte vial</h4>

Nombre: <br />
<input name="nombre" type="text" id="nombre" size="30" class=":required"><br />

Teléfono: <br />
<input name="telefono" type="text" id="telefono" size="30" class=":required"><br />


<input type="submit" name="Submit" value="Enviar" />
</form>  	

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>