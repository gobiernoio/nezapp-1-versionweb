<?php session_start();

if(isset($_POST['usuario'])) {
	$usuario = $_POST['usuario'];
	if($usuario == "nezappadmin") {
		
		if($_POST['password'] == "juanhugo2016"){
			$_SESSION['usuario'] = "Administador";
		}
		else {
			echo "Error: La contraseña es incorrecta";
		}

	}
	else {
		echo "Erro: El usuario es incorrecto";
	}
}


if (isset($_GET['canal'])) {
	$canal =  $_GET['canal']; 
} else {
	$canal = "presidente-r26f";
}

?>



<!DOCTYPE html>
<html ng-app="nezAppPanel">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>Pruebas</title>
	
	<script src="https://code.jquery.com/jquery-2.2.1.min.js" integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00=" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
	<script src="https://cdn.firebase.com/js/client/2.4.1/firebase.js"></script>
	<script src="https://cdn.firebase.com/libs/angularfire/1.1.4/angularfire.min.js"></script>
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<style>
		.preloader {
    		background: url('preloader.gif') no-repeat 45% 30% transparent;
    		position: absolute;
    		width: 100%;
    		height: 90vh;
    		z-index: 9999;
		}

		.pre-scrollable {
			max-height: 600px!important;
		}
	</style>
</head>
<body>




<!-- Si hay Sesión -->
<?php if(isset($_SESSION['usuario'])) { ?>
<div class="container" style="margin-top: 1em;" ng-controller="barraLateral">

	<div class="row">

		<nav class="navbar navbar-default energized" role="navigation">
		  <!-- El logotipo y el icono que despliega el menú se agrupan
		       para mostrarlos mejor en los dispositivos móviles -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse"
		            data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Desplegar navegación</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="#">NezApp 0.7 Beta</a>
		  </div>
		 
		  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
		       otro elemento que se pueda ocultar al minimizar la barra -->
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav">
		      
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          Seleccionar Canal <b class="caret"></b>
		        </a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=presidente-r26f">Juan Hugo de la Rosa, Presidente Municipal</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=seguridad-j39x">Seguridad Ciudadana</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=agua-l29x">Agua Potable</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=bomberos-240s">Bomberos y Protección Civil</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=servicios-p19f">Servicios Públicos</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=tramites-p3x0">Trámites y Servicios</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=dif-s9u8">DIF</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=zonanorte-zn45">Zona Norte</a></li>
		          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=cultura-r4m3">Cultura y Educación</a></li>
		        </ul>
		      </li>

		      <li><a href="salir.php">Cerrar Sesión</a></li>
		    </ul>
		 
		  </div>
		</nav>
	</div>

	

	<div class="row">
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Chats en <?php echo $canal; ?>
					</div>

					<div class="panel-body pre-scrollable">
						<div ng-repeat="usuario in usuarios" class="btn btn-warning btn-block" ng-click="mostrarMensajes(usuario.$id, usuario.usuario)">
							{{ usuario.usuario }}
						</div>
					</div>
				</div>
			</div>


			<div class="col-xs-8 custom">

				<div class="panel panel-default">
				  <div class="panel-heading">{{ usuarioEnTurno }}</div>
				  

				  <div class="panel-body pre-scrollable contenedor-mensajes">
				  	<div class="preloader" ng-show="cargador">
					</div>

				   	 <div ng-repeat="mensaje in mensajes" ng-hide="cargador" class="panel-group">
						
							<div class="row" ng-if="usuarioId === mensaje.usuarioId">

								<div class="col-xs-10">
										<div class="panel panel-success">
										  	<div class="panel-heading">{{mensaje.usuario}}</div>
										    <div class="panel-body">{{mensaje.mensaje}}</div>
										  </div>
								</div>

								<div class="col-xs-2"></div>
							
							</div>

							<div class="row" ng-if="usuarioId !== mensaje.usuarioId">

								<div class="col-xs-2"></div>

								<div class="col-xs-10">
									<div class="panel panel-warning">
									  	<div class="panel-heading">{{mensaje.usuario}}</div>
									    <div class="panel-body">{{mensaje.mensaje}}</div>
									</div>
								</div>

								
							</div>


						</div>
				  </div>
				</div>
				
			</div>
	</div>

</div>

<?php } else { ?>

<div class="container">
	<div class="row">
		
		<div class="col-xs-4"></div>
		

		<div class="col-xs-4" style="padding-top: 3em;">
			<form action="nezapp.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="usr">Name:</label>
				  <input type="text" class="form-control" id="usr" name="usuario">
				</div>
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" class="form-control" id="pwd" name="password">
				</div>
				<div class="form-group">
				  <input type="submit" class="form-control btn btn-warning btn-block" id="pwd" value="Iniciar Sesión">
				</div>
			</form>
		</div>

		<div class="col-xs-4"></div>


	</div>
</div>
<?php } ?>
	

<script>
	var nezApp = angular.module('nezAppPanel', ["firebase"])

	nezApp.controller ('barraLateral', [ '$scope', '$firebaseArray', function($scope, $firebaseArray) {
		var myFirebaseRef = new Firebase("https://nezapp.firebaseio.com/usuarios/<?php echo $canal ?>/mischats");
	
		myFirebaseRef.once("value", function(snapshot) {
		  	$scope.usuarios = $firebaseArray(myFirebaseRef.orderByChild("orden"));
		  	//console.log($scope.usuarios);
		});


		$scope.mostrarMensajes = function(usuarioId, usuario) {
			$scope.cargador = true;

			var chat = usuarioId;
			$scope.usuarioEnTurno = usuario;
			$scope.usuarioId = usuarioId;
			var otroRef = new Firebase("https://nezapp.firebaseio.com/usuarios/<?php echo $canal ?>/mensajes/"+chat);
			
			otroRef.once("value", function(snapshot) {
			  	$scope.mensajes = $firebaseArray(otroRef);
			  	$scope.cargador = false;
			});
		}

		

	}])

</script>

</body>
</html>