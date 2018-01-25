/* ---------- Codigo mapa mostrar el mapa con sus características ---------- */
google.maps.event.addDomListener(window, "load", function () {
    const ubicacion = new Localizacion(() => {
        //se recogen los valores de latitud y longitud en una constante llamada 'myLatLng'. 
        const myLatLng = {lat: ubicacion.latitude, lng: ubicacion.longitude};
        //en la variable texto se guardará el contenido que mostrará al colocarse el marcador en nuestra posición.
        var texto = '<h1> Esta es tu ubicación actual </h1>' + '<p> Descripcion del lugar </p>' +
                '<a href="https://www.google.com">Pagina web</a>';
        const options = {
            center: myLatLng,
            zoom: 14
        };
        var map = document.getElementById('map');
        const mapa = new google.maps.Map(map, options);
        const marcador = new google.maps.Marker({
            //atributos del marcador.
            position: myLatLng,
            map: mapa,
            title: "Ubicación"
        });
        
//        var gCoder = new google.maps.Geocoder();
        
        var informacion = new google.maps.InfoWindow({
            content: texto
        });

        //evento para abrir la ventana de información.
        marcador.addListener('click', function () {
            informacion.open(mapa, marcador);
        });

        /* -------------- Codigo de autocompletado de Origen y destino -------------- */

        var autocompleteOrigen = document.getElementById('autocompleteOrigen');
        var autocompleteDestino = document.getElementById('autocompleteDestino');
        const searchOrigen = new google.maps.places.Autocomplete(autocompleteOrigen);
        const searchDestino = new google.maps.places.Autocomplete(autocompleteDestino);
        //el método binTo restringirá los resultados de busqueda. 
        searchOrigen.bindTo("bounds", mapa);
        searchDestino.bindTo("bounds", mapa);

        searchOrigen.addListener('place_changed', function () {

            informacion.close();
            marcador.setVisible(false);

            var place = searchOrigen.getPlace();

            if (!place.geometry.viewport) {
                window.alert("Error al mostrar el lugar de origen");
                return;
            }
            if (place.geometry.viewport) {
                mapa.fitBounds(place.geometry.viewport);
            } else {
                mapa.setCenter(place.geometry.location);
                mapa.setZoom(18);
            }
            marcador.setPosition(place.geometry.location);
            marcador.setVisible(true);

            var address = "";
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ];
            }

            informacion.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            informacion.open(map, marcador);
        });
        searchDestino.addListener('place_changed', function () {

            informacion.close();
            marcador.setVisible(false);

            var place = searchDestino.getPlace();

            if (!place.geometry.viewport) {
                window.alert("Error al mostrar el lugar de destino");
                return;
            }
            if (place.geometry.viewport) {
                mapa.fitBounds(place.geometry.viewport);
            } else {
                mapa.setCenter(place.geometry.location);
                mapa.setZoom(18);
            }
            marcador.setPosition(place.geometry.location);
            marcador.setVisible(true);

            var address = "";
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ];
            }

            informacion.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            informacion.open(map, marcador);
        });

//        var objconfigDR = {
//            map: mapa
//           suppressMarkers: true
//        };
//
//        alert(autocompleteOrigen);
//        var objConfigDS = {
//            origin: autocompleteOrigen, //LatLong - String domicilio.
//            destination: autocompleteDestino,
//            travelMode: google.maps.TravelMode.DRIVING
//        };
//
//        var ds = new google.maps.DirectionsService(); //obtener coordenadas.
//        var dr = new google.maps.DirectionsRenderer(objconfigDR); //traduce coordenadas a la ruta visible
//
//        ds.route(objConfigDS, fnRutear);
//
//        function fnRutear(resultados, status) {
//            //mostrar la línea entre A y B.
//            if (status === 'OK') {
//                dr.setDirections(resultados);
//            } else {
//                alert('Error ' + status);
//            }
//        }

    });
});
