<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<span class="boton_todos"><a href="categorias.php">Mostrar Todos</a></span>

<form method="post" action="categorias.php">
Ingresar numero clave o texto: <input type="text" name="busqueda">
<input type="submit" value="Buscar">
</form>

<?php
if(isset($_GET['order'])) $order = $_GET['order'];
else $order = "id";

if(isset($_POST['busqueda'])) {
	$busqueda = $_POST['busqueda'];
	$result = mysql_query("SELECT * FROM $tabla_categorias WHERE categoria like '%$busqueda%' or id like '%$busqueda%'");
}
else {
	$result = mysql_query("select * FROM ".$tabla_categorias." order by $order");
}

if(mysql_num_rows($result)) {
?>

<table width="920">
<tr>
	<th><a href="categorias.php?order=id">Clave</a></th>
	<th><a href="categorias.php?order=categoria">Categoria</a></th>
	<th colspan="3">Acciones</th>
</tr>

<?php while ($row = mysql_fetch_array($result)){ ?>
    <tr bgcolor="<?php
		if(isset($row['publico'])) {
		if($row['publico']==1) echo "#AFA";
	    else echo "#DDD";
		}
	else {echo "#EEE";} ?>">
    
    <td width="20"><?php echo $row['id']; ?></td>
	<td><?php echo $row['categoria']; ?></td>
       
	<td class="eliminar" width="32">
    <a href="borrar.php?id=<?php echo $row['id']; ?>&amp;tabla=<?php echo $tabla_categorias ?>" onclick="return pregunta();">Eliminar</a>
    </td>
    
    <td class="modificar" width="32">
    <a href="categorias_borrar.php?id=<?php echo $row['id']; ?>" onclick="return pregunta();">Modificar</a>
    </td>
    
    <td class="publicar" width="32">
    <a href="categorias_borrar.php?id=<?php echo $row['id']; ?>" onclick="return pregunta();">Publicar</a>
    </td>

<?php 
}
?>

</tr>
</table>
   

<?php
}
else {
echo '<div class="aviso">No tienes Categorias Registradas</div>';
}
?>
   
<form method="get" action="categorias_insertar.php" enctype="multipart/form-data">
<h4>INSERTAR UNA CATEGORIA</h4>
Inserte Categoria: <input name="categoria" type="text" id="categoria" size="30" class=":required">
<input type="submit" name="Submit" value="Enviar" />
</form>  	

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>