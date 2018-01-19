/* ----- Codigo mapa autocompletado google api -----*/
google.maps.event.addDomListener(window, "load", function () {
    const ubicacion = new Localizacion(() => {
        const myLatLng = {lat: ubicacion.latitude, lng: ubicacion.longitude};
        var texto = '<h1> Nombre del lugar </h1>' + '<p> Descripcion del lugar </p>' +
                '<a href="https://www.google.com">Pagina web</a>';
        const options = {
            center: myLatLng,
            zoom: 14
        }
        var map = document.getElementById('mapa-dcha');
        const mapa = new google.maps.Map(map, options);
        const marcador = new google.maps.Market({
            position: myLatLng,
            map: mapa,
            title: "Mi primer marcador"
        });

        var informacion = new google.maps.InfoWindow({
            content: texto
        });

        marcador.addListener('click', function () {
            informacion.open(mapa, marcador);
        });
        var autocomplete = document.getElementById('autocomplete');
        const search = new google.maps.places.Autocomplete(autocomplete);
        search.bindTo("bounds", mapa);
    });
});

/* ----- Constructor mapa google api -----*/
function initMap() {
    const ubicacion = new Localizacion(() => {
        const options = {
            center: {
                lat: ubicacion.latitude,
                lng: ubicacion.longitude
            },
            zoom: 15
        };
        var map = document.getElementById('mapa-dcha');
        const mapa = new google.maps.Map(map, options);
    });
}
/*----------------------------------------------------------------------------*/