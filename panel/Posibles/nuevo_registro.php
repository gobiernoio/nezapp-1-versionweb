<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->
    
<form action="enviando_registro.php" method="post" enctype="multipart/form-data">
   
        <input name="publico" type="checkbox" checked="checked" value="1" /> Hacer publica    <br />  
      
    	Elige Subcategoría
        <?php get_select($tabla_categorias, "categoria", "categoria") ?><br />

        Titulo:<br />
        <input name="titulo" type="text" class=":required" size="60"><br />
        
        Imagen:<br />
        <input name="imagen" type="file" size="30"><br /><br />

        <input type="submit" value="Añadir Foto" />	
        
</form>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>