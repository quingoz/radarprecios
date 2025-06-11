document.addEventListener('DOMContentLoaded', function() {

    $('.select2').select2();

    
    var centerPosition = JSON.parse(document.getElementById('centerData').getAttribute('data-value'));
    var dataMapa = JSON.parse(document.getElementById('mapaData').getAttribute('data-value'));
    var mediaUrl = document.getElementById('mediaUrl').getAttribute('data-value');
    var script = document.createElement('script');
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCYsEXjqibylS7mdxRXk1EJ6KR4O_8Mb54&callback=initMap&v=weekly&libraries=drawing';
    script.async = true;

    let infoWindows = {};
    let markers = {};

    let infowindow = null;

    var flexMap = document.querySelector('#mapa');
    flexMap.style.display = 'flex';

  
    function initMap() {
      const mapa = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 6,
        center: {
            "lat": centerPosition.lat,
            "lng": centerPosition.lng
                },
        styles: [
          {
            featureType: 'poi',
            elementType: 'labels',
            stylers: [{ visibility: 'off' }]
          }
        ]
      });
  
      const drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {
          position: google.maps.ControlPosition.TOP_CENTER,
          drawingModes: [
            google.maps.drawing.OverlayType.MARKER,
            google.maps.drawing.OverlayType.CIRCLE,
            google.maps.drawing.OverlayType.POLYGON,
            google.maps.drawing.OverlayType.POLYLINE,
            google.maps.drawing.OverlayType.RECTANGLE,
          ],
        },
        markerOptions: {
          icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
        },
        circleOptions: {
          fillColor: '#ff0000',
          fillOpacity: 0.5,
          strokeWeight: 1,
          clickable: false,
          editable: true,
          zIndex: 1,
        },
      });
  
      drawingManager.setMap(mapa);
      
      dataMapa.forEach((value, key) => {
        // Crea una clave dinámica para cada infoWindow
        infoWindows[key] = new google.maps.InfoWindow({
          content: value['INFO'],
        });
        
        //let positionMap = `{"lat": ${value['LATITUD']}, "lng": ${value['LONGITUD']}}`;
        //let positionMap = JSON.parse(value['POSITION']);
        // Crea un marcador con las propiedades
        

        let positionMap = {
          lat: parseFloat(value['LATITUD']),
          lng: parseFloat(value['LONGITUD'])
        };
        
        console.log(positionMap);

        markers[key] = new google.maps.Marker({
          position: positionMap, // Asegúrate de que esto sea un objeto {lat, lng}
          map: mapa, // Suponiendo que 'mapa' ya está definido
          label: value['LABEL'],
          icon: `${mediaUrl}/img/markers/marker_icon-${value['ICON']}.svg`, // icono dinámico
          title: value['TITLE'].replace(/`/g, ''), // Elimina las comillas invertidas
          optimized: false,
        });
        

        // Añade un listener al marcador para abrir la ventana de información
        markers[key].addListener('click', () => {
          // Cierra cualquier ventana de información activa
          if (infowindow) {
            infowindow.close();
          }
    
          // Asigna la nueva ventana de información y ábrela
          infowindow = infoWindows[key];
          infowindow.open({
            anchor: markers[key],
            map: mapa,
            shouldFocus: false,
          });
        });
    });

    }
  
    // Función para eliminar todos los marcadores
    function clearMarkers() {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
      }
      markers = [];
    }
  
    window.initMap = initMap;
    window.clearMarkers = clearMarkers;
    document.head.appendChild(script);
  
  }, false);
  