// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js

angular.module('starter', ['ionic', 'ngCordova', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform) {


  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)


    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);


    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }


  });
})

.config(function($stateProvider, $urlRouterProvider, $ionicConfigProvider, $compileProvider) {
  $ionicConfigProvider.backButton.text("Atrás");

  //$compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|geo|mailto|tel|chrome-extension):/); 
  //$compileProvider.imgSrcSanitizationWhitelist(/^\s*(https?|ftp|file|blob|content):|data:image\//);

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

  // setup an abstract state for the tabs directive
    .state('tab', {
    url: '/tab',
    abstract: true,
    templateUrl: 'templates/tabs.html'
  })

  // Each tab has its own nav history stack:

  .state('instalacionpaso1', {
    url: '/instalacionpaso1',    
    templateUrl: 'templates/instalacion/paso1.html',
    controller: 'instalacionPaso1Ctrl'
  })

  .state('instalacionpaso2', {
    url: '/instalacionpaso2',    
    templateUrl: 'templates/instalacion/paso2.html',
    controller: 'instalacionPaso2Ctrl'
  })

  .state('instalacionpaso3', {
    url: '/instalacionpaso3',    
    templateUrl: 'templates/instalacion/paso3.html',
    controller: 'instalacionPaso3Ctrl'
  })

  .state('tab.inicio', {
    url: '/inicio',
    views: {
      'tab-inicio': {
        templateUrl: 'templates/tab-inicio.html',
        controller: 'inicioCtrl'
      }
    }
  })


  .state('tab.noticias', {
    url: '/noticias',
    views: {
      'tab-noticias': {
        templateUrl: 'templates/tab-noticias.html',
        controller: 'NoticiasCtrl'
      }
    }
  })

  .state('tab.vialidad', {
    url: '/vialidad',
    views: {
      'tab-vialidad': {
        templateUrl: 'templates/tab-vialidad.html',
        controller: 'VialidadCtrl'
      }
    }
  })

  .state('tab.chats', {
      cache: false,
      url: '/chats',
      views: {
        'tab-chats': {
          templateUrl: 'templates/tab-chats.html',
          controller: 'ChatsCtrl'
        }
      }
    })
    .state('tab.chat-detail', {
      url: '/chats/:destinatarioId/:destinatarioNombre',
      views: {
        'tab-chats': {
          templateUrl: 'templates/chat-detail.html',
          controller: 'ChatDetailCtrl'
        }
      }
    })

 .state('tab.sitios', {
      url: '/sitios',
      views: {
        'tab-sitios': {
          templateUrl: 'templates/sitios/tab-sitios.html',
          controller: 'SitiosCtrl'
        }
      }
  })
 .state('tab.cabildo', {
      url: '/cabildo',
      views: {
        'tab-cabildo': {
          templateUrl: 'templates/tab-cabildo.html',
          controller: 'CabildoCtrl'
        }
      }
  })
  .state('tab.sitio-detalle', {
    url: '/sitios/:sitioId',
    views: {
      'tab-sitios': {
        templateUrl: 'templates/sitios/tab-sitio-detalle.html',
        controller: 'SitioDetalleCtrl'
      }
    }
  })

  .state('tab.historia', {
      url: '/historia',
      views: {
        'tab-historia': {
          templateUrl: 'templates/tab-historia.html'
        }
      }
  })

  .state('tab.directorio', {
    url: '/directorio',
    views: {
      'tab-directorio': {
        templateUrl: 'templates/tab-directorio.html',
        controller: 'DirectorioCtrl'
      }
    }
  });

  var id = window.localStorage['usuarioId'];

  if(id) {
    $urlRouterProvider.otherwise('/tab/chats');
  }
  else {
    $urlRouterProvider.otherwise('/instalacionpaso1');
    //window.localStorage['myId'] = randomString(20);
  }


});



function traerUsuario() {
  return window.localStorage['usuario'];
}

function traerUsuarioId() {
  return window.localStorage['usuarioId'];
}