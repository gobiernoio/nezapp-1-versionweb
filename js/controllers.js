angular.module('starter.controllers', ['firebase'])

.controller('inicioCtrl', function($scope, $ionicPopup, $ionicLoading) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  var registrado = window.localStorage['registrado'];

  if (registrado) {
    // Si ya está registrado -> No sucede nada
  }
  else {
    var usuario = window.localStorage['usuarioTMP'];
    var usuarioId = window.localStorage['usuarioIdTMP'];

    console.log("El usuario es: " + usuario);
    console.log("El usuarioId es: " + usuarioId);


    confirmarNotificaciones = function() {
       var confirmPopup = $ionicPopup.confirm({
         title: 'Autorización para recibir notificaciones',
         template: '¿Autoriza esta aplicación para enviarle notificaciones cuando tenga un nuevo mensaje?'
       });

       confirmPopup.then(function(res) {
         if(res) {
           document.addEventListener("deviceready", onDeviceReady, false);
            function onDeviceReady() {
                //Subscribe a los canales necesarios en parse
                window.parsePlugin.initialize("A9xhApLQnP8OJGQNPAIkUKNBktKyp0mQyNmBA402", "GnBEAUS9pPrIfmCdIt5BLLbKnhBqCcsJYLH2UBqj", function() {
                    //window.parsePlugin.subscribe("noticias", function() {});
                    window.parsePlugin.subscribe(usuarioId, function() {});
                });
            }
            console.log('Aceptaste notificaciones');
         } else {
           console.log('No has aceptado');
         }
       });
     };


    confirmarNotificaciones();
    
    window.localStorage['usuario'] = usuario;
    window.localStorage['usuarioId'] = usuarioId;
    console.log("El usuario es: " + window.localStorage['usuario']);
    console.log("El Id es: " + window.localStorage['usuarioId']);
    window.localStorage['registrado'] = true;
  }

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });

})




//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    --------------------------------------------------------------- INSTALACION PASO 1
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******

.controller('instalacionPaso1Ctrl', function($scope, $ionicPopup, $ionicViewService, $ionicLoading) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });
  
  //función que crea un usuario.
  $scope.crearUsuario = function() {
    //Creamos la función que genera un alfanúmerico aleatorio, 
    //recibe un parametro "lenght" que es el número de digitos que tendrá dicho alfanúmerico
    var randomString = function(length) {
      var text = "";
      var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for(var i = 0; i < length; i++) {
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
      return text;
    }


    var error = false;  //Declaramos a cero los errores
    var usuario = this.nombre; //Obtenemos el campo nombre
    var usuarioToken = randomString(4); //creamos un string de 8 digitos

    //comprobamos que se escribió un usuario de lo contrario se lanza error
    if(usuario) {
      var longitud = usuario.length;
      //comprobamos que el usuario escrito tenga al menos 3 letras de lo contrario se lanza error
      if(longitud < 3) {
          error = true;
      }
    }
    else {
      //Si no hay usuario escrito también marcamos error
      error = true;
    }

    //Si (!)no hay error creamos el usuario uniendo el número aleatorio junto con el nombre
    //que capturó el usuario, lo almacenamos y mandamos a la pantalla welcome2
    if (!error) {
        var usuarioId = usuario + "-" + usuarioToken;

        // Almacenamos nombre y id temporales.
        window.localStorage['usuarioTMP'] = usuario;
        window.localStorage['usuarioIdTMP'] = usuarioId;

        //Lo mostramos por consola
        console.log("Se creó el usuario temporal: " + window.localStorage['usuarioTMP']);
        console.log("Con la Id temporal: " + window.localStorage['usuarioIdTMP']);

        $ionicViewService.nextViewOptions({
           disableBack: true
        });


        //Al final lo mandamos a la pantalla No. 2
        location.href="#/instalacionpaso2";
    }
    //Si hay error se avisa al cliente 
    else {
      var alertPopup = $ionicPopup.alert({
         title: 'Coloca un nombre valido',
       });
    }
  }

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})




//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    --------------------------------------------------------------- INSTALACION PASO 2
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******

.controller('instalacionPaso2Ctrl', function($scope, $ionicPopup, $ionicViewService, $timeout, $ionicLoading) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });
  
  var miId = window.localStorage['usuarioIdTMP'];
  
  $scope.listo = true; // Muestra el botón finalizar
  $scope.puerta = false; // Oculta la puerta trasera
  $scope.myID = window.localStorage['usuarioIdTMP']; // Muestra la id Temporal en pantalla
  var maximosgolpes = 7; //Número de golpes necesarios para abrir la puerta trasera 
  var conteodegolpes = 1; //Contador de golpes inicializado a 1

  //Función que cuenta los golpes sobre el ID
  $scope.golpeame = function () {
    conteodegolpes++;

    if( conteodegolpes > maximosgolpes) {
        $scope.listo = false; //Cambia listo a falso para evitar instalación completa
        $scope.puerta = true; //Muestra la puerta trasera
    }
  }

  // Función que cambia el ID por el nuevo colocado
  $scope.cambiarId = function() {
    var error = false; // Inicia error a 0
    var nuevaid = this.inputnuevaid; // Asigna la nueva id escrita en el input

    //Comprobamos ahora que el id esté escrita y tenga al menos 3 letras, de lo contrario lanzamos error.
    if(nuevaid) {
      var longitud = nuevaid.length;
      if(longitud < 5) {
          error = true; // Error por escribir menos de 3 letras
      }
    }
    else {
      error = true; // Error por no escribir nada
    }

    // Si (!)NO hay error hacemos lo siguiente
    if (!error) {
        var usuarioid = nuevaid;
        window.localStorage['usuarioIdTMP'] = usuarioid;

        console.log("Se actualizo la id a: " +  window.localStorage['usuarioIdTMP']); // Mostramos consola

        $ionicViewService.nextViewOptions({
           disableBack: true
        });


        location.href="#/instalacionpaso3"; //Mandamos al paso 3
    }
    // De lo contrario si encontramos error hacemos lo siguiente
    else {
      var alertPopup = $ionicPopup.alert({
         title: 'Coloca una nueva ID valida',
       });
       /*
      var alertPopup = $ionicPopup.confirm({
         title: 'Esta App desea enviarle notificaciones, ¿desea recibirlas?',
       });
      */
    }
  }

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})




//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    --------------------------------------------------------------- INSTALACION PASO 3
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******

// Este paso es solo usado para confirmar un cambio de Id.
.controller('instalacionPaso3Ctrl', function($scope, $ionicPopup, $timeout, $ionicLoading) { 
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  var myId = window.localStorage['usuarioIdTMP'];
  $scope.myId = myId;

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})


//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    --------------------------------------------------------------- Chats
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
.controller('ChatsCtrl', function($scope, $ionicPopup, Chats, $ionicLoading, $firebaseArray) {
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  

  var usuario = traerUsuario();
  var usuarioId = traerUsuarioId();
  var ref = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + usuarioId + '/mischats/');
  
  /*
  ref.orderByChild("fecha").on("child_added", function(snapshot) {
    console.log(snapshot.key() + " was " + snapshot.val().fecha + " meters tall");
  });
  */

  //ref.orderByChild("ultimomensaje");

  $scope.mischats = $firebaseArray(ref.orderByChild("orden"));
  console.log(usuarioId);

  /*
  ref.on("value", function(snapshot) {
    var mischats = snapshot.val();
    $scope.mischats = snapshot.val();
    
  }, function (errorObject) {
    console.log("The read failed: " + errorObject.code);
  });
  */

  
  $scope.remove = function( usuarioaborrar ) {
    var ref = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + usuarioId + '/mischats/' + usuarioaborrar);
    ref.remove();
  };

  $scope.chats = Chats.all();
  
 
  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });

})
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******
//    --------------------------------------------------------------- Chats Detalle
//    ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* ******* *******

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats, $firebaseArray, $http, $ionicScrollDelegate, $ionicLoading, $timeout, $filter) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  $scope.$on('$ionicView.afterEnter', function(e) {
      var conBadge = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + destinatarioId + '/mischats/' + usuarioId + '/badge');
     
      conBadge.once('value', function (dataSnapshot) {
    // this.x is 1
      var elDato = dataSnapshot.val();
      ultimoDato = elDato + 1;
    }, { });
  });



  var destinatarioId = $stateParams.destinatarioId;
  var destinatarioNombre = $stateParams.destinatarioNombre;
  var usuario = traerUsuario();
  var usuarioId = traerUsuarioId();


  var reiniciarBadge = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + usuarioId + '/mischats/' + destinatarioId + '/badge');
  
  reiniciarBadge.once("value", function(snapshot) {
    var a = snapshot.exists();
    
    if(a) { reiniciarBadge.update({ badge: 0 }) }
  });

  //console.log( reiniciarBadge.exists() );
  //reiniciarBadge.update({ badge: 0 });



  var viewScroll = $ionicScrollDelegate.$getByHandle('userMessageScroll');

  $scope.usuario = traerUsuario();
  $scope.usuarioId = traerUsuarioId();
  $scope.destinatario = $stateParams.destinatarioNombre;
  $scope.destinatarioId = $stateParams.destinatarioId;

  var de = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + usuarioId + '/mensajes/' + destinatarioId);
  var para = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + destinatarioId + '/mensajes/' + usuarioId);
  var susmensajes = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + destinatarioId + '/mischats/' + usuarioId);
  var mismensajes = new Firebase('https://pruebasbeto.firebaseio.com/usuarios/' + usuarioId + '/mischats/' + destinatarioId);


  $scope.mensajes = $firebaseArray(de);

  de.on("child_added", function() {
    viewScroll.scrollBottom(true);
  });

  $timeout(function() {
    footerBar = document.body.querySelector('#userMessagesView .bar-footer');
    scroller = document.body.querySelector('#userMessagesView .scroll-content');
    txtInput = angular.element(footerBar.querySelector('textarea'));
  }, 0);


  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });

  $scope.enviarMensaje = function enviarMensaje() {
    
    

    document.addEventListener("load", onDeviceReady, false);
    function onDeviceReady() {
        //Subscribe a los canales necesarios en parse
        console.log("Estoy afuera: " + elDato);    
    }


    var enviarPush = function(mensaje, destinatario, nombre) {
    var elMensaje = mensaje;
    var elDestinatario = destinatario;
    var elNombre = nombre;

    //var nuevoBadge = actualBadge + 1;

    $http({ "headers": { "X-Parse-Application-Id": "A9xhApLQnP8OJGQNPAIkUKNBktKyp0mQyNmBA402", "X-Parse-REST-API-Key": "vfgdB5Dce145yh3x7hqbyU5mfia04CTg4V28lRYu", "Content-Type": "application/json" },
      "url": "https://api.parse.com/1/push",
      "method": "POST",
      "message" : elMensaje, 

        "data": {
          "data": { 
            "title": "Mensaje de " + elNombre, 
            "sound": "cheering.caf",
            "alert": elMensaje 
          },
        "channel": elDestinatario, 
        "message" : elMensaje
        }

      }).success(function (data, status, headers, config) { console.log("Push sent!");
      //alert('iOS registered success = ' + data + ' Status ' + status); 
      }).error(function (data, status, headers, config) { console.log(config) });
    }

    enviarPush(this.mensaje, destinatarioId, destinatarioNombre);

    var makeFecha = $filter('date')(new Date());
    var makeHora = $filter('date')(new Date(), 'HH:mm');
    var newBadge = ultimoDato + 1; 


    timePositive = Date.now();
    timeNegative = timePositive - ( timePositive * 2 );
    console.log( timeNegative );



    de.push({
      hora: makeHora, 
      fecha: makeFecha, 
      usuario: usuario, 
      usuarioId: usuarioId, 
      destinatario: destinatarioNombre, 
      destinatarioId: destinatarioId, 
      mensaje: this.mensaje
    });

    para.push({
      hora: makeHora, 
      fecha: makeFecha, 
      usuario: usuario, 
      usuarioId: usuarioId, 
      destinatario: destinatarioNombre, 
      destinatarioId: destinatarioId, 
      mensaje: this.mensaje
    });


    susmensajes.set({
      orden: timeNegative, 
      hora: makeHora, 
      fecha: makeFecha, 
      usuario: usuario, 
      usuarioId: usuarioId, 
      ultimomensaje: this.mensaje, 
      badge: ultimoDato
    });

    mismensajes.set({
      orden: timeNegative, 
      hora: makeHora, 
      fecha: makeFecha, 
      usuario: destinatarioNombre, 
      usuarioId: destinatarioId, 
      ultimomensaje: this.mensaje
    });

    $scope.mensaje = '';

    viewScroll.scrollBottom(true);

    
  }


  /*
  
  */
  
  $scope.$on('$ionicView.beforeEnter', function(e) {
      $ionicLoading.hide();
  });

})



.controller('NoticiasCtrl', function($scope, $firebaseArray, $http, $ionicLoading, $filter) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  var getNoticias = new Firebase('https://pruebasbeto.firebaseio.com/noticias/');
  var makeFechaNoticas = $filter('date')(new Date(), 'dd/MM/yy - hh:mm');
  console.log(makeFechaNoticas);


  $scope.noticias = $firebaseArray(getNoticias.orderByChild("orden"));
  
  /*
  timePositive = Date.now();
  timeNegative = timePositive - ( timePositive * 2 );
  console.log( timeNegative );

  getNoticias.push({
    orden: timeNegative, 
    titulo: "Noticia ok 22", 
    fecha: makeFechaNoticas, 
    imagen: "http://lorempixel.com/400/200/", 
    enlace: "http://hechoenneza.com",
    noticia: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi maxime repellat, commodi accusantium fugit, qui fugiat sapiente quam incidunt, porro deleniti quae beatae vel debitis. Dolore deserunt ut dolores non quia. Magni laborum aperiam consequuntur aut, sint quis illo iste necessitatibus facilis. Beatae libero maxime consequatur consectetur culpa in dignissimos laudantium commodi vitae. Laudantium rem, aperiam repellendus."
  });
  */

  
  
  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})

.controller('VialidadCtrl', function($scope, $firebaseArray, $http, $filter, $ionicLoading) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  var getVialidad = new Firebase('https://pruebasbeto.firebaseio.com/vialidad/');
  $scope.vialidad = $firebaseArray(getVialidad.orderByChild("orden"));
  //$scope.vialidad = $firebaseArray(getVialidad);

  var makeFecha = $filter('date')(new Date(), 'hh:mm dd/MM/yy');
  
  /*
  timePositive = Date.now();
  timeNegative = timePositive - ( timePositive * 2 );
  console.log( timeNegative );
  
  getVialidad.push({
    orden: timeNegative, 
    titulo: "Noticia ok 27", 
    fecha: makeFecha, 
    noticia: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi maxime repellat, commodi accusantium fugit, qui fugiat sapiente quam incidunt, porro deleniti quae beatae vel debitis. Dolore deserunt ut dolores non quia. Magni laborum aperiam consequuntur aut, sint quis illo iste necessitatibus facilis. Beatae libero maxime consequatur consectetur culpa in dignissimos laudantium commodi vitae. Laudantium rem, aperiam repellendus."
  });
  */

  
  
  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})


.controller('SitiosCtrl', function($scope, Sitios, $ionicLoading) {  
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  $scope.sitios = Sitios.all();

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})


.controller('CabildoCtrl', function($scope, Cabildos, $ionicLoading) {  
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  $scope.cabildos = Cabildos.all();

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})


.controller('SitioDetalleCtrl', function($scope, $stateParams, Sitios, $ionicLoading) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  $scope.sitio = Sitios.get($stateParams.sitioId);

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
})


.controller('DirectorioCtrl', function($scope, Telefonos, $ionicLoading, $firebaseArray) {
  // Setup the loader
  $ionicLoading.show({
    content: 'Cargando',
    animation: 'fade-in',
    showBackdrop: true,
    maxWidth: 200,
    showDelay: 0
  });

  var getDirectorio = new Firebase('https://pruebasbeto.firebaseio.com/directorio/');
  $scope.telefonos = $firebaseArray(getDirectorio);
  /*
  getDirectorio.push({
      nombre: "Bomberos", 
      telefono: "57358758"
    });
  */

  //$scope.telefonos = Telefonos.all();

  $scope.$on('$ionicView.afterEnter', function(e) {
      $ionicLoading.hide();
  });
});
