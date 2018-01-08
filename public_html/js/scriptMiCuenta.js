$(document).ready(function () {
    funcionConsultaTrayectosConductor();
    funcionConsultaTrayectosPasajero();
    funcionPeticiones();

//////////////////Mostrar trayectos conductor/////////////////////////////////////////
    function funcionConsultaTrayectosPasajero() {
        //alert('funcionnnnn')
        $('#tablaPasajero').html(' ');
        $('#tablaPasajero').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_pasajero.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaPasajero').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += " <th class='idtrayecto'>idtrayecto</th>\n\
               <th class='origen'>origen</th>\n\
               <th class='destino'>destino</th>\n\
               <th class='fecha_hora'>fecha_hora</th>\n\
               <th class='plazas'>plazas</th>\n\
               <th class='paradas'>paradas</th>\n\
               <th class='idusuario'>idusuario</th>\n\ \n\
               <th class='idusuario'></th>\n\ ";
                midato = JSON.parse(datos);
                $
                        .each(
                                midato,
                                function (i, dato) {
                                    tabla += "<tr>";
                                    tabla += "<td class='idtrayecto'>" +
                                            dato.idtrayecto +
                                            "</td>";
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
                                    tabla += "<td class='idusuario'>" + dato.idusuario +
                                            "</td>";
                                    tabla += "<td class='opciones'>";
                                    tabla += "<input type=image src='../../../../ZASCAR/public_html/img/eliminar.png' width='18' height='15'></td>";
                                    tabla += "</tr>";
                                });
                tabla += "</table>";
                //  alert(tabla)
                $('#tablaPasajero').append(tabla).hide()
                        .fadeIn('slow');
                return false;
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });
    }
    ;
//////////////////Mostrar trayectos conductor/////////////////////////////////////////
    function funcionConsultaTrayectosConductor() {
        //alert('funcionnnnn')
        $('#tablaConductor').html(' ');
        $('#tablaConductor').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_conductor.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaConductor').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += " <th class='idtrayecto'>idtrayecto</th>\n\
               <th class='origen'>origen</th>\n\
               <th class='destino'>destino</th>\n\
               <th class='fecha_hora'>fecha_hora</th>\n\
               <th class='plazas'>plazas</th>\n\
               <th class='paradas'>paradas</th>\n\
               <th class='idusuario'>idusuario</th>\n\ ";
                midato = JSON.parse(datos);
                $
                        .each(
                                midato,
                                function (i, dato) {
                                    tabla += "<tr>";
                                    tabla += "<td class='idtrayecto'>" +
                                            dato.idtrayecto +
                                            "</td>";
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
                                    tabla += "<td class='idusuario'>" + dato.idusuario +
                                            "</td>";
                                    tabla += "</tr>";
                                });
                tabla += "</table>";
                //  alert(tabla)
                $('#tablaConductor').append(tabla).hide()
                        .fadeIn('slow');
                return false;
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });
    }
    ;

//////////////////Mostrar trayectos conductor/////////////////////////////////////////
    function funcionPeticiones() {
        //alert('funcionnnnn')
        $('#tablaPeticiones').html(' ');
        $('#tablaPeticiones').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_peticiones.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaPeticiones').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += " <th class='idtrayecto'>idtrayecto</th>\n\
               <th class='origen'>origen</th>\n\
               <th class='destino'>destino</th>\n\
               <th class='fecha_hora'>fecha_hora</th>\n\
               <th class='plazas'>plazas</th>\n\
               <th class='paradas'>paradas</th>\n\
               <th class='idusuario'>idusuario</th>\n\ \n\
               <th class='idusuario'></th>\n\ ";
                midato = JSON.parse(datos);
                $
                        .each(
                                midato,
                                function (i, dato) {
                                    tabla += "<tr>";
                                    tabla += "<td class='idtrayecto'>" +
                                            dato.idtrayecto +
                                            "</td>";
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
                                    tabla += "<td class='idusuario'>" + dato.idusuario +
                                            "</td>";
                                    tabla += "<td class='opciones'>";
                                    tabla += "<input type=image src='../../../../ZASCAR/public_html/img/aceptar.png' width='20' height='17'></td>";
                                    tabla += "</tr>";
                                });
                tabla += "</table>";
                //  alert(tabla)
                $('#tablaPeticiones').append(tabla).hide()
                        .fadeIn('slow');
                return false;
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });
    }
    ;

});

