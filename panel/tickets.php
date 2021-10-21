<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<span class="boton_todos"><a href="tickets.php">Mostrar Todos</a></span>

<form method="post" action="tickets.php">
Ingresar numero clave o texto: <input type="text" name="busqueda">
<input type="submit" value="Buscar">
</form>

<?php
if(isset($_GET['order'])) $order = $_GET['order'];
else $order = "id";

if(isset($_POST['busqueda'])) {
	$busqueda = $_POST['busqueda'];
	$result = mysql_query("SELECT * FROM tickets WHERE asunto like '%$busqueda%' or mensaje like '%$busqueda%'");
}
else {
	$result = mysql_query("select * FROM tickets order by $order DESC");
}

if(mysql_num_rows($result)) {
?>

<table width="920">
<tr>
	<th>Ticket</th>
	<th>Asunto</th>
    <th>Fecha</th>
    <th>Estado</th>
	<th colspan="1">Acciones</th>
</tr>

<?php while ($row = mysql_fetch_array($result)){ ?>
    <tr bgcolor="<?php
		if(isset($row['estado'])) {
		if($row['estado']=="pendiente") echo "#FF9900";
	    else echo "#DDDDDD";
		}
	else {echo "#EEEEEE";} ?>">
    
    <td width="20"><?php echo $row['num']; ?></td>
	<td><?php echo $row['asunto']; ?></td>
    <td><?php echo fecha_esp($row['fecha_creacion']); ?></td>
    <td><?php echo $row['estado']; ?></td>
       
	<td class="eliminar" width="32">
    <a href="borrar.php?id=<?php echo $row['id']; ?>&amp;tabla=<?php echo "tickets" ?>" onclick="return pregunta();">Eliminar</a>
    </td>
       

<?php 
}
?>

</tr>
</table>
   

<?php
}
else {
echo '<div class="aviso">No tienes Tickets abiertos</div>';
}
?>
   
<form method="get" action="ticket_insertar.php" enctype="multipart/form-data">
<h4>Crear nuevo ticket</h4>
Asunto: <br />
<input name="asunto" type="text" size="30" class=":required"><br />
Descripción: <br />
<textarea cols="50" rows="5" class=":required" name="descripcion"></textarea><br />

Prioridad:
<select name="prioridad">
<option value="normal">Normal</option>
<option value="urgente">Urgente</option>
</select><br />

<input type="submit" name="Submit" value="Enviar" />
</form>  	

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>