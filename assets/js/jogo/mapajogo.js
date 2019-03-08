//http://www.mapdevelopers.com/geocode_tool.php
var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 19,
          center: new google.maps.LatLng(-30.865341,-51.800741),
          mapTypeId: 'satellite'
        });

        var iconBase = './assets/img/pokemons/';
        var pokemons = [];

        class Poke{
          constructor(lat, long, iconeFile, info){
            this.position = new google.maps.LatLng(lat,long);
            this.type = 'info';
            this.icon = iconBase + iconeFile;
            this.info = info;
          }
        }

        var criatura = new Poke(-30.865604,-51.800211, 'bulbasauro.png', '<div id="poke-info">' +
        '<p class="poke-titulo">Bulbassauro</p>'+
        '<ul><li>HP - 100</li></ul>' +
        '</div>');

        pokemons.push(criatura);

        var criatura = new Poke(-30.865701,-51.801173, 'charmander.png', '<div id="poke-info">' +
        '<p class="poke-titulo">Charmander</p>'+
        '<ul><li>HP - 90</li></ul>' +
        '</div>');

        pokemons.push(criatura);
         
        
        //inicializa objeto de janela de info dos marcadores
        var infowindow = new google.maps.InfoWindow();

        //criar os marcadores
        for(i = 0; i < pokemons.length; i++){

          var marker = new google.maps.Marker({
            position: pokemons[i].position,
            icon : pokemons[i].icon,
            map: map
          });

          var conteudo = pokemons[i].info;
          //adiciona evento de clique aos marcadores
          google.maps.event.addListener(marker,'click', (function(marker,conteudo,infowindow){ 
              return function() {
                infowindow.setContent(conteudo);//setando a string html para a janela do marcador
                infowindow.open(map,marker);
              };
          })(marker,conteudo,infowindow));

        }

        // //criar os marcadores
        // pokemons.forEach(function(pokemon) {
        //   var marker = new google.maps.Marker({
        //     position: pokemon.position,
        //     //icon: icons[feature.type].icon,
        //     icon : pokemon.icon,
        //     map: map
        //   });

        //   var conteudo = pokemon.info;
          
        //   //adiciona evento de clique aos marcadores
        //   google.maps.event.addListener(marker,'click', (function(marker,conteudo,infowindow){ 
        //       return function() {
        //         infowindow.setContent(conteudo);//setando a string html para a janela do marcador
        //         infowindow.open(map,marker);
        //       };
        //   })(marker,conteudo,infowindow)); 
        // });
      }