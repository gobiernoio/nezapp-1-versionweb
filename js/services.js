angular.module('starter.services', [])

.factory('Chats', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var chats = [{
    id: 'presidente-r26f',
    nombre: 'Juan Hugo de la Rosa, Presidente Municipal',
    face: 'img/logoschat/presidencia.png'
  }, {
    id: 'seguridad-j39x',
    nombre: 'Seguridad Pública',
    face: 'img/logoschat/seguridad.png'
  }, {
    id: 'agua-l29x',
    nombre: 'Agua Potable',
    face: 'img/logoschat/agua.png'
  }, {
    id: 'bomberos-240s',
    nombre: 'Bomberos y Protección Civil',
    face: 'img/logoschat/bomberos.png'
  }, {
    id: 'servicios-p19f',
    nombre: 'Servicios Públicos',
    face: 'img/logoschat/servicios.png'
  }, {
    id: 'tramites-p3x0',
    nombre: 'Tramites y Servicios',
    face: 'img/logoschat/tramites.png'
  }, {
    id: 'dif-s9u8',
    nombre: 'DIF',
    face: 'img/logoschat/dif.png'
  }, {
    id: 'zonanorte-zn45',
    nombre: 'Zona Norte',
    face: 'img/logoschat/zonanorte.png'
  }, {
    id: 'cultura-r4m3',
    nombre: 'Cultura Educación',
    face: 'img/logoschat/cultura.png'
  }
  ];

  return {
    all: function() {
      return chats;
    },
    remove: function(chat) {
      chats.splice(chats.indexOf(chat), 1);
    },
    get: function(chatId) {
      for (var i = 0; i < chats.length; i++) {
        if (chats[i].id === parseInt(chatId)) {
          return chats[i];
        }
      }
      return null;
    }
  };
})



.factory('Telefonos', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var telefonos = [{
    id: '0',
    nombre: 'Policia Municipal',
    telefono: '57434343'
  }, {
    id: '0',
    nombre: 'Bomberos',
    telefono: '57358758'
  }
  ];

  return {
    all: function() {
      return telefonos;
    },
    remove: function(telefono) {
      telefonos.splice(telefonos.indexOf(telefono), 1);
    },
    get: function(telefonoId) {
      for (var i = 0; i < telefonos.length; i++) {
        if (telefonos[i].id === parseInt(telefonoId)) {
          return telefonos[i];
        }
      }
      return null;
    }
  };
})




.factory('Sitios', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var sitios = [
  {
    id: 0,
    name: 'Cabeza de Coyote',
    resumen: 'La obra escultórica denominada “Cabeza de Coyote” del artista Sebastián, de 40 metros de altura y un peso de 298 toneladas es considerada una de las obras más grandes no sólo del estado de México sino del país y de América Latina. Se localiza en la glorieta que forman las avenidas Adolfo López Mateos y Pantitlán, se inició en el 2005 pero fue hasta el 23 de abril de 2008 cuando pudo ser inaugurada.',
    fotominiatura: 'img/sitios/coyote.jpg',
    fotogrande: 'img/sitios/grandes/coyote.jpg'
  },
  {
    id: 1,
    name: 'Estadio Neza',
    resumen: 'El estadio “Neza 86”, está situado en el interior de la Universidad Tecnológica de Nezahualcóyotl, fue inaugurado en 1981 como Estadio "José López Portillo" y fue renombrado como "Neza 86" en el marco de la Copa Mundial de Fútbol de ese mismo año. Cuenta con una capacidad de 28.500 personas y está en proceso de remodelación, en su historia cuenta con partidos realizados en la copa del mundo de México 86.',
    fotominiatura: 'img/sitios/estadio.png',
    fotogrande: 'img/sitios/grandes/estadio.png'
  },
  {
    id: 2,
    name: 'El Parque del Pueblo',
    resumen: 'El zoológico Parque del Pueblo, está ubicado entre las calles de Linda Vista y S. Esteban, cuanta con un museo en el que se brinda información acerca de pieles y animales disecados, cuenta con un zoológico y un lago donde se puede dar un paseo en lanchas.',
    fotominiatura: 'img/sitios/parque.jpg',
    fotogrande: 'img/sitios/grandes/parque.jpg'
  },
  {
    id: 3,
    name: 'El Barquito',
    resumen: '“El barquito”, es uno de los principales iconos del municipio de Nezahualcóyotl, el pasado 18 de octubre se reinauguro después de años de abandono, respetando el concepto del barquito que se construyó hace 40 años, ahora cuenta con palmeras, pintura antigraffiti, palapas, areneros, juegos acuáticos, iluminación y bruma, siendo de nuevo el punto de encuentro de familias que disfrutan la diversión que les proporciona. Se ubica en Av. Chimalhuacán.',
    fotominiatura: 'img/sitios/barco.jpg',
    fotogrande: 'img/sitios/grandes/barco.jpg'
  },
  {
    id: 4,
    name: 'El Pulpo',
    resumen: '“El Pulpo”, este es un espacio de convivencia familiar por excelencia en el municipio, el pasado 22 de marzo, se reinauguró, cuenta con juegos para los pequeños, además de fuentes de agua potable reciclada para la diversión de los jóvenes, el Parque Acuático El Pulpo es uno de los más de 70 espacios públicos que se recuperan en el municipio. Se localiza sobre Av. Pantitlán.',
    fotominiatura: 'img/sitios/pulpo.jpg',
    fotogrande: 'img/sitios/grandes/pulpo.jpg'
  },
  {
    id: 5,
    name: 'Parque Temático Las Fuentes',
    resumen: 'Parque temático Las Fuentes, es un espacio recuperado y transformado en un parque temático sobre la Av. Bordo de Xochiaca, cuenta con 110 fuentes danzarinas e iluminación, una ciudad a escala con carros eléctricos y mecánicos para fomentar la cultura vial en los niños, juegos infantiles y áreas deportivas con cancha de futbol y basquetbol.',
    fotominiatura: 'img/sitios/lasfuentes.jpg',
    fotogrande: 'img/sitios/grandes/lasfuentes.jpg'
  },
  {
    id: 6,
    name: 'El Palacio Municipal',
    resumen: 'Palacio Municipal de Nezahualcóyotl, es el centro vital del municipio, cuenta con 3 estatuas que dan la bienvenida a sus visitantes, la del Rey poeta Nezahualcóyotl, Moctezuma y Cuauhtémoc, en su plaza se llevan a cabo actividades deportivas y culturales, es el marco de reunión para familias que conviven durante la tarde, donde los niños y jóvenes pueden jugar y correr. Los fines de semana puedes encontrar puestos de antojitos, juegos, actividades artísticas entre otros.',
    fotominiatura: 'img/sitios/Palacio.jpg',
    fotogrande: 'img/sitios/grandes/Palacio.jpg'
  },
  {
    id: 7,
    name: 'Centro Cultural Plurifuncional',
    resumen: 'Este centro está ubicado en la colonia Vicente Villada, cuenta con murales en su interior realizado por muralistas chilenos y artistas locales, en este recinto se han llevado a cabo obras de teatro, musicales, conciertos de fama nacional, estos eventos han sido gratuitos, para fomento de la cultura en el municipio. Su auditorio cuenta con tecnología de vanguardia que puede albergar este tipo de eventos.',
    fotominiatura: 'img/sitios/pluri.jpg',
    fotogrande: 'img/sitios/grandes/pluri.jpg'
  },
  {
    id: 8,
    name: 'Biblioteca Jaime Torres Bodet',
    resumen: 'Ubicada en Av. Chimalhuacán, es la biblioteca más importante del municipio, se fundó en 1987, sus instalaciones son accesibles e incitan a la lectura, aquí se imparten conferencias, funciones de teatro, exposiciones de artes plásticas, entre otras actividades. Cuenta en su interior con una librería del Fondo de Cultura Económica que lleva el nombre de Elena Poniatowska. Es el espacio de fomento cultural más importante de Nezahualcóyotl.',
    fotominiatura: 'img/sitios/biblioteca.jpg',
    fotogrande: 'img/sitios/grandes/biblioteca.jpg'
  },
  {
    id: 9,
    name: 'Plaza Ciudad Jardín',
    resumen: 'Ubicado en lo que fue uno de los últimos espacios del antiguo y floreciente Lago de Texcoco, sobre Av. Bordo de Xochiaca, se encuentra plaza Ciudad Jardín, es una plaza moderna que cuenta con tiendas de prestigiadas marcas que la convierten en el punto de encuentro tanto por los habitantes de Neza, como de las personas de municipios cercanos, ya que, podemos encontrar restaurantes, salas de cine, entre muchas cosas más, este es un lugar de recreo para las familias.',
    fotominiatura: 'img/sitios/plaza.jpg',
    fotogrande: 'img/sitios/grandes/plaza.jpg'
  }
  ];

  return {
    all: function() {
      return sitios;
    },
    remove: function(sitio) {
      sitios.splice(sitios.indexOf(sitio), 1);
    },
    get: function(sitioId) {
      for (var i = 0; i < sitios.length; i++) {
        if (sitios[i].id === parseInt(sitioId)) {
          return sitios[i];
        }
      }
      return null;
    }
  };
})


.factory('Cabildos', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var cabildos = [
    { 
      id: 30,
      nombre: 'Juan Hugo de la Rosa García', 
      puesto: 'Presidente Municipal', 
      foto: 'img/cabildo/juanhugo.jpg'
    },
    { 
      id: 0,
      nombre: 'Maria Guadalupe Pérez Hernández', 
      puesto: '1er Síndico', 
      foto: 'img/cabildo/maria.jpg'
    },
    {
      id: 1,
      nombre: 'Adolfo Cerqueda Rebollo', 
      puesto: '2º Síndico', 
      foto: 'img/cabildo/adolfo.jpg'
    },
    {
      id: 2,
      nombre: 'Coralia María Luisa Villegas Romero', 
      puesto: '3er Síndico', 
      foto: 'img/cabildo/coralia.jpg'
    },
    {
      id: 3,
      nombre: 'Verónica Romero Tapia', 
      puesto: '1er Regidor', 
      foto: 'img/cabildo/veronica.jpg'
    },
    {
      id: 4,
      nombre: 'Omar Nieves Ávila', 
      puesto: '2º Regidor', 
      foto: 'img/cabildo/omar.jpg'
    },
    {
      id: 5,
      nombre: 'Adolfina García Torres', 
      puesto: '3er Regidor', 
      foto: 'img/cabildo/adolfina.jpg'
    },
    {
      id: 6,
      nombre: 'Martín Zepeda Hernández', 
      puesto: '4º Regidor', 
      foto: 'img/cabildo/martinz.jpg'
    },
    {
      id: 7,
      nombre: 'Elia Cruz Solano', 
      puesto: '5º Regidor', 
      foto: 'img/cabildo/elia.jpg'
    },
    {
      id: 8,
      nombre: 'Francisco Gómez Altamirano', 
      puesto: '6º Regidor', 
      foto: 'img/cabildo/francisco.jpg'
    },
    {
      id: 9,
      nombre: 'Karina Stephany Pérez Carrillo', 
      puesto: '7º Regidor', 
      foto: 'img/cabildo/karina.jpg'
    },
    {
      id: 10,
      nombre: 'Alfredo Esquivel Ramos', 
      puesto: '8º Regidor', 
      foto: 'img/cabildo/alfredo.jpg'
    },
    {
      id: 11,
      nombre: 'Joaquina Navarrete Contreras', 
      puesto: '9º Regidor', 
      foto: 'img/cabildo/joaquina.jpg'
    },
    {
      id: 12,
      nombre: 'José De Jesús Herrera Atilano', 
      puesto: '10º Regidor', 
      foto: 'img/cabildo/jose.jpg'
    },

    {
      id: 13,
      nombre: 'Sonia Macrina Martínez Quintana', 
      puesto: '11º Regidor', 
      foto: 'img/cabildo/macrina.jpg'
    },
    {
      id: 14,
      nombre: 'Alma Angélica Quiles Martínez', 
      puesto: '12º Regidor', 
      foto: 'img/cabildo/alma.jpg'
    },
    {
      id: 15,
      nombre: 'Omar Rodríguez Cisneros', 
      puesto: '13º Regidor', 
      foto: 'img/cabildo/omarr.jpg'
    },
    {
      id: 16,
      nombre: 'Honoria Arellano Ocampo', 
      puesto: '14º Regidor', 
      foto: 'img/cabildo/honoria.jpg'
    },
    {
      id: 17,
      nombre: 'Israel Montoya', 
      puesto: '15º Regidor', 
      foto: 'img/cabildo/israel.jpg'
    },
    {
      id: 18,
      nombre: 'Josefina Hernández', 
      puesto: '16º Regidor', 
      foto: 'img/cabildo/josefina.jpg'
    },
    {
      id: 19,
      nombre: 'Martín Cortez López', 
      puesto: '17º Regidor', 
      foto: 'img/cabildo/martinc.jpg'
    },
    {
      id: 20,
      nombre: 'Blasa Estrada', 
      puesto: '18º Regidor', 
      foto: 'img/cabildo/blasa.jpg'
    },
    {
      id: 21,
      nombre: 'Antonio Zanabria Ortiz', 
      puesto: '19º Regidor', 
      foto: 'img/cabildo/antonio.jpg'
    }

  ];

  return {
    all: function() {
      return cabildos;
    },
    remove: function(cabildo) {
      cabildos.splice(cabildos.indexOf(cabildo), 1);
    },
    get: function(cabildoId) {
      for (var i = 0; i < cabildos.length; i++) {
        if (cabildos[i].id === parseInt(cabildoId)) {
          return cabildos[i];
        }
      }
      return null;
    }
  };
})