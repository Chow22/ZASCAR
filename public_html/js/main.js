/* ----------------- Codigo mapa autocompletado google api ----------------- */
google.maps.event.addDomListener(window, "load", function () {
    const ubicacion = new Localizacion(() => {
        const myLatLng = {lat: ubicacion.latitude, lng: ubicacion.longitude};
        var texto = '<h1> Esta es tu ubicación actual </h1>' + '<p> Descripcion del lugar </p>' +
                '<a href="https://www.google.com">Pagina web</a>';
        const options = {
            center: myLatLng,
            zoom: 14
        };
        var map = document.getElementById('map');
        const mapa = new google.maps.Map(map, options);
        const marcador = new google.maps.Marker({
            position: myLatLng,
            map: mapa

        });

        var informacion = new google.maps.InfoWindow({
            content: texto
        });

        marcador.addListener('click', function () {
            informacion.open(mapa, marcador);
        });
        var autocompleteOrigen = document.getElementById('autocompleteOrigen');
        var autocompleteDestino = document.getElementById('autocompleteDestino');
        const searchOrigen = new google.maps.places.Autocomplete(autocompleteOrigen);
        const searchDestino = new google.maps.places.Autocomplete(autocompleteDestino);
        searchOrigen.bindTo("bounds", mapa);
        searchDestino.bindTo("bounds", mapa);

        searchOrigen.addListener('place_changed', function () {

            informacion.close();
            marcador.setVisible(false);

            var place = searchOrigen.getPlace();

            if (!place.geometry.viewport) {
                window.alert("Error al mostrar el lugar");
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
                window.alert("Error al mostrar el lugar");
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
    });
});
