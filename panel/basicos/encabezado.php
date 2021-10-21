<?php session_start(); include("conexion.php"); include("hmedia/funciones.php"); include("hmedia/configuracion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de Control</title>
<link href="hmedia/estilo.css" rel="stylesheet" type="text/css" />
<link href="hmedia/lytebox.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="hmedia/jquery.js"></script>
<script type="text/javascript" src="hmedia/lytebox.js"></script>
<script type="text/javascript" src="hmedia/vanadium.js"></script>

<script type="text/javascript">
function pregunta(){ 
   if (!(confirm('¿Estas seguro de ejecutar esta acción?'))){ 
      return false;
   } 
} 
</script> 
</head>

<body>
<div id="contenedor">

<div id="encabezado">
    <div class="titulo">Panel de Control</div>
    
<?php if(isset($_SESSION['usuario'])) { ?>
    <div id="menu">
        <ul>
        <li><a href="nuevo_registro.php">Publicar Nuevo</a></li>
        <li><a href="navegar_registros.php">Revisar Fotos</a></li>
        <li><a href="categorias.php">Categorias</a></li>
        <li><a href="salir.php">Salir</a></li>
        </ul>
    </div>
<?php } ?>
</div>

<div id="principal">