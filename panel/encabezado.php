<?php session_start(); include("hmedia/funciones.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de Control</title>
<link href="hmedia/estilo.css" rel="stylesheet" type="text/css" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script type="text/javascript" src="hmedia/vanadium.js"></script>

<script type="text/javascript">
function pregunta(){ 
   if (!(confirm('¿Estas seguro de ejecutar esta acción?'))){ 
      return false;
   } 
} 
</script> 


<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://cdn.firebase.com/js/client/2.4.0/firebase.js"></script>
</head>

<body>
<div id="contenedor">

<div id="encabezado">
    <div class="titulo">Panel de Control</div>
    
<?php if(isset($_SESSION['usuario'])) { ?>
    <div id="menu">
        <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="reportevial.php">Lanzar Reporte Vial</a></li>
        <li><a href="noticia.php">Enviar Noticia</a></li>
        <li><a href="agenda.php">Agregar Agenda</a></li>
        <li><a href="notificaciones.php">Enviar Notificación</a></li>
        <li><a href="salir.php">Salir</a></li>
        </ul>
    </div>
<?php } ?>
</div>

<div id="principal">