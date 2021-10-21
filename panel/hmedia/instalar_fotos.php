<?php
include("../conexion.php");
include("configuracion.php");


$sql_categorias = "create table ".$tabla_categorias." (
id int not null auto_increment,
categoria varchar(50),
primary key(id)
);";

$sql_fotos = "create table ".$tabla_fotos." (
id int not null auto_increment,
categoria varchar(50),
publico varchar(1),
titulo varchar(50),
imagen varchar(50),
fecha date,
primary key(id)
);";

$sql_usuarios = "create table ".$tabla_usuarios." (
id int not null auto_increment,
nombre varchar(15),
apellidos varchar(50),
usuario varchar(30),
password varchar(30),
estado varchar(1),
tipo varchar(15),
email varchar(90),
telefono varchar(50),
ciudad varchar(30),
cuenta varchar(30),
notas varchar(50),
fecha date,
primary key(id)
);";

$crear_usuarios = "INSERT INTO ".$tabla_usuarios." VALUES(
'', 
'', 
'', 
'$usuario',
'$pass',
'', 
'', 
'', 
'', 
'', 
'', 
'', 
''
);";

if(mysql_query($sql_categorias)) echo "Se ha instalado la tabla ".$tabla_categorias." <br />";
else echo "Ocurrió un error al instalar la tabla ".$tabla_categorias."<br />";

if(mysql_query($sql_fotos)) echo "Se ha instalado la tabla ".$tabla_fotos." <br />";
else echo "Ocurrió un error al instalar la tabla ".$tabla_fotos."<br />";

if(mysql_query($sql_usuarios)) echo "Se ha instalado la tabla ".$tabla_usuarios." <br />";
else echo "Ocurrió un error al instalar la tabla ".$tabla_usuarios."<br />";

if(mysql_query($crear_usuarios)) echo "Se ha creado el usuario ".$usuario." <br />";
else echo "Ocurrió un error al crear el usuario ".$usuario."<br />";

?>