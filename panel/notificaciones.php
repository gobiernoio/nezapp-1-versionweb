<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->


   
<form method="post" action="notificaciones_enviar.php" enctype="multipart/form-data">

<h4>Envia una notificación</h4>

Mensaje: <br />
<input name="mensaje" type="text" id="mensaje" size="30" class=":required"><br />

<!--
Destino: <br />
<input name="destino" type="text" id="destino" size="30" class=":required"><br />
-->

<input type="submit" name="Submit" value="Enviar" />
</form>  	

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>