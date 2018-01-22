$(document).ready(function () {

    idusu = $('#idusuSession').text();
    $('#tablaTrayectos').html(' ');
//        $('#tablaTrayectos').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');
    $.ajax({
        type: 'POST',
        data: "submit=&idusu=" + idusu,
        dstaType: 'json',
        url: "../controlador/controlador_consulta_trayectos_conductor.php",
        success: function (datos) {
            //  alert(datos)
            $('#tablaTrayectos').fadeIn(1000).html("");
            var tabla = "<br> \n\
              <table class='tabla'>";
            tabla += "\n\
               <th class='origen'>Origen</th>\n\
               <th class='destino'>Destino</th>\n\
               <th class='fecha_hora'>Fecha-Hora</th>\n\
               <th class='plazas'>Plazas</th>\n\
               <th class='paradas'>Paradas</th>\n\
               <th class='acciones'>Acciones</th>\n\
                ";
            midato = JSON.parse(datos);
            $
                    .each(
                            midato,
                            function (i, dato) {
                                tabla += "<tr>";
                                tabla += "<td class='origen'>" +
                                        dato.origen +
                                        "</td>";
                                tabla += "<td class='destino'>" +
                                        dato.destino +
                                        "</td>";
                                tabla += "<td class='fecha_hora'>" +
                                        dato.fecha_hora +
                                        "</td>";
                                tabla += "<td class='plazas'>" +
                                        dato.plazas +
                                        "</td>";
                                tabla += "<td class='paradas'>" + dato.paradas +
                                        "</td>";
                                tabla += "<td><input type='image' class='borrarTrayecto' src='../img/eliminar.png' data-idtrayecto='" + dato.idtrayecto + " ' alt='' width='15' height='15'></td>";
                                tabla += "</tr>";
                            });
            tabla += "</table>";
            //  alert(tabla)
            $('#tablaTrayectos').append(tabla).hide()
                    .fadeIn('slow');
            return false;
        },
        error: function (xhr) {
            alert("An error occured: " + xhr.status +
                    " " + xhr.statusText);
        }
    });
    
    $(".borrarTrayecto").on("click", function(){
        alert("hola");
//        window.alert("¿Seguro que desea borrar trayecto?");
//        borrarTrayecto();
//        return false;
    });
    
    
    function borrarTrayecto(idTrayecto) {

//        idusu = $('#idusuSession').text();
        //alert(idtrayecto);
        //alert(idsolic);

        $.ajax({
            type: 'POST',
            data: "submit=&idtrayecto=" + idtrayecto + "&idusu=" + idsolic,
            dstaType: 'json',
            url: "../controlador/controlador_borrar_trayecto.php",
            success: function (datos) {
                alert("Peticion aceptada");
                //alert(datos);
                funcionPeticiones();
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });
    }
    
}); 