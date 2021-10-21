<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->


   
<form method="post" action="noticia_insertar.php" enctype="multipart/form-data">

<h4>Crear nuevo reporte vial</h4>

Título: <br />
<input name="titulo" type="text" id="titulo" size="30" class=":required"><br />

Imagen: (Debe pegarse la URL de la imagen si quiere que aparezca una en la nota.)<br />
<input name="imagen" type="text" id="imagen" size="30" class=":required"><br />

Enlace: (El enlace a la nota completa)<br />
<input name="enlace" type="text" id="enlace" size="30" class=":required"><br />

Nota: (Resumen de la nota, debe hacerse en 1 solo parrafo.) <br />
<textarea name="nota" cols="50" rows="5" class=":required"></textarea><br />

<input type="submit" name="Submit" value="Enviar" />
</form>  	

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>