<?php include("encabezado.php"); ?>

    <?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<span class="boton_todos"><a href="categorias.php">Mostrar Todos</a></span>

<form method="post" action="navegar_registros.php">
Filtrar por: <input type="text" name="busqueda">
<input type="submit" value="Filtrar">
</form>

<?php
if(isset($_GET['order'])) $order = $_GET['order'];
else $order = "id";

if(isset($_POST['busqueda'])) {
	$busqueda = $_POST['busqueda'];
	$result = mysql_query("SELECT * FROM ".$tabla_fotos." WHERE categoria like '%$busqueda%' or id like '%$busqueda%' or titulo like '%$busqueda%'");
}
else {
	$result = mysql_query("select * from ".$tabla_fotos." order by $order");
}

if(mysql_num_rows($result)) {
?>

<table width="900">
<tr>
	<th><a href="navegar_registros.php?order=id">Clave</a></th>
    <th>Foto</th>
	<th><a href="navegar_registros.php?order=categoria">Categoria</a></th>
    <th><a href="navegar_registros.php?order=titulo">Titulo</a></th>
	<th colspan="2">Acciones</th>
</tr>

<?php while ($row = mysql_fetch_array($result)){ ?>
    <tr bgcolor="<?php
		if(isset($row['publico'])) {
		if($row['publico']==1) echo "#AFA";
	    else echo "#DDD";
		}
	else {echo "#EEE";} ?>">
    
    <td width="20"><?php echo $row['id']; ?></td>
    
    <td align="center" width="20">
    <a href="<?php echo "../".$carpeta."/".$row['imagen'];?>" rel="lytebox/lytebox" title="<?php echo $row['titulo'] ?>">
    <img src="<?php echo "../".$carpeta."/thumbs/".$row['imagen']; ?>" height="50" class="th_img"/></a>
    </td>
    
	<td><?php echo $row['categoria']; ?></td>
    
    <td><?php echo $row['titulo']; ?></td>
       
	<td class="eliminar" width="32">
    <a href="borrar_registro.php?id=<?php echo $row['id']?>&amp;foto=<?php echo $row['imagen']?>" onclick="return pregunta();">Eliminar</a>
    </td>
    
    <td class="publicar" width="32">
    <a href="publicar.php?id=<?php echo $row['id']; ?>&amp;publico=<?php echo $row['publico']; ?>">Publicar</a>
    </td>

<?php 
}
?>

</tr>
</table>
   

<?php
}
else {
echo '<div class="aviso">No tienes fotos publicadas</div>';
}
?>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>

<?php include("pie.php"); ?>