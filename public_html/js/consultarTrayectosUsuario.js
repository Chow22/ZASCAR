$(document).ready(function () {

    idusu = $('#idusuSession').text();
    $('#tablaTrayectos').html(' ');

    RellenarTabla();

    function RellenarTabla() {
        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_conductor.php",
            success: function (datos) {
//                  alert(datos);
                if (Object.keys(datos).length === 2) {
                    var p = "<br/><br/><strong class='strindex'>Este usuario no tiene trayectos, añádelo <a href='../vista/insertarTrayectos.php'>aquí</a></strong>";
                    $("#tablaTrayectos").append(p);
                } else {
                    $('#tablaTrayectos').fadeIn(1000).html("");
                    var tabla = "<br> \n\
                    <div class='margeneslista'>\n\
                    <div class='container'>\n\
                    <div class='listWrap'>\n\
                    <ul class='list tabla-listar'>";
                    tabla += "<li>\n\
                    <span>Origen</span>\n\
                    <span>Destino</span>\n\
                    <span>Fecha-Hora</span>\n\
                    <span>Plazas</span>\n\
                    <span>Paradas</span>\n\
                    <span>Acciones</span>\n\
                    </li>";
                    midato = JSON.parse(datos);
                    $
                            .each(
                                    midato,
                                    function (i, dato) {
                                        tabla += "<li>";
                                        tabla += "<span class='tabla-campos'>" +
                                                dato.origen +
                                                "</span>";
                                        tabla += "<span class='tabla-campos'>" +
                                                dato.destino +
                                                "</span>";
                                        tabla += "<span>" +
                                                dato.fecha_hora +
                                                "</span>";
                                        tabla += "<span>" +
                                                dato.plazas +
                                                "</span>";
                                        tabla += "<span class='tabla-campos'>" + dato.paradas +
                                                "</span>";
                                        tabla += "<span><input type='image' class='tabla-campos' id='borrarTrayecto' src='../img/eliminar.png' data-idtrayecto='" + dato.idtrayecto + " ' alt='' width='15' height='15'></span>";
                                        tabla +="</li>";
                                    });
                    tabla += "</ul>\n\
                    <div/>\n\
                    <div/>\n\
                    <div/>";
//              alert(tabla);
                    $('#tablaTrayectos').append(tabla).hide().fadeIn('slow');
                    return false;
                }
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });
    }

    $("#tablaTrayectos").on("click", "#borrarTrayecto", function () {

        var confirmar = confirm("¿Seguro que desea borrar trayecto?");
        if (!confirmar) {
            return false;
        }
        idtrayecto = $(this).attr("data-idtrayecto");

        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu + "&idtrayecto=" + idtrayecto,
            dstaType: 'json',
            url: "../controlador/controlador_borrar_trayectoConductor.php",
            success: function (datos) {
                alert("Su trayecto se ha borrado");
                RellenarTabla();
                //alert(datos);
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });

    });

}); 