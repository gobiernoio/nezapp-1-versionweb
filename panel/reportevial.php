<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->


   
<form method="post" action="reporte_insertar.php" enctype="multipart/form-data">

<h4>Crear nuevo reporte vial</h4>

Título: <br />
<input name="titulo" type="text" id="titulo" size="30" class=":required"><br />

Descripción: (Debe hacerse en 1 solo parrafo.) <br />
<textarea name="mensaje" cols="50" rows="5" class=":required"></textarea><br />

<input type="submit" name="Submit" value="Enviar" />
</form>  	

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>