        $(document).ready(function(){
funcionConsultaTrayectosConductor();
funcionConsultaTrayectosPasajero();

//////////////////Mostrar trayectos conductor/////////////////////////////////////////
        function funcionConsultaTrayectosPasajero() {
          //alert('funcionnnnn')
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
        });

