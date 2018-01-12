$(document).ready(function () {
    //alert("entramos al js preparense");
    idtrayecto = 0;
    idsolic = 0;
    idBorrar = 0;
    funcionConsultaTrayectosConductor();

    funcionConsultaTrayectosPasajero();

    funcionPeticiones();

    rellenarDatos();

    //alert("0");
//////////////////eliminar trayecto pasajero/////////////////////////////////////////
    $('#tablaPasajero').on("click", "#borrar", function () {
        // alert('borrando');
        idBorrar = $(this).attr("data-idBorrar");
        funcionBorrar();
        return false;
    });


    function funcionBorrar() {
        //alert("eliminandoo");

        idusu = 7;
        //alert(idBorrar);
        $.ajax({
            type: 'POST',
            data: "submit=&id=" + idBorrar + "&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_borrar_trayectoPasajero.php",
            success: function (datos) {
                alert("Se ha eliminado con exito");
                //alert(datos);
                funcionConsultaTrayectosPasajero();
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });

    }
    ;


//////////////////aceptar peticion/////////////////////////////////////////
    $('#tablaPeticiones').on("click", "#aceptar", function () {
        //alert('boton aceptar ok');
        idtrayecto = $(this).attr("data-idtrayecto");
        idsolic = $(this).attr("data-idsolic");
        //alert(idtrayecto);
        funcionAceptar();
        return false;
    });


    function funcionAceptar() {

        idusu = 7;
        //alert(idtrayecto);
         //alert(idsolic);
        
        $.ajax({
            type: 'POST',
            data: "submit=&idtrayecto=" + idtrayecto + "&idusu=" + idsolic,
            dstaType: 'json',
            url: "../controlador/controlador_aceptar_peticiones.php",
            success: function (datos) {
                alert("Peticion aceptada");
                alert(datos);
                funcionPeticiones();
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });

    }
    ;


//////////////////guardar datos/////////////////////////////////////////
    $('#modificar').click(function () {
        //alert("boton modificar");
        funcionModificar();
        return false;
    });


    function funcionModificar() {
        //alert("modificandoooo");
        id = 7;
        nombre = $('#nombre').val();
        apellido = $('#apellido').val();
        telefono = $('#telefono').val();
        email = $('#email').val();
        imagen = $('#imagenlink').val();
        user = $('#user').val();
        pass = $('#pass').val();
        marca = $('#marca').val();
        plazas = $('#plazas').val();
        combustible = $('#combustible').val();
        matricula = $('#matricula').val();
        // alert(nombre);
        $.ajax({
            type: 'POST',
            data: "submit=&id=" + id + "&nombre=" + nombre + "&apellido=" + apellido + "&telefono=" + telefono + "&email=" + email + "&imagen=" + imagen + "&user=" + user + "&pass=" + pass + "&marca=" + marca + "&plazas=" + plazas + "&combustible=" + combustible + "&matricula=" + matricula,
            dstaType: 'json',
            url: "../controlador/controlador_modificar_usuario.php",
            success: function (datos) {
                alert("Se ha modificado con exito");
                //alert(datos);
                location.reload();
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status +
                        " " + xhr.statusText);
            }
        });

    }
    ;




//////////////////rellenar inputs de bd/////////////////////////////////////////
    function rellenarDatos() {
        // alert('rellenarDAtos')
        idusu ="<?php echo $_SESSION['idusu'];?>";
        idusu=7;
        //alert (idusu);
        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/usuario_controlador.php",
            success: function (datos) {
                // alert(datos)
                midato = JSON.parse(datos);
                $
                        .each(
                                midato,
                                function (i, dato) {
                                    $('#nombre').val(dato.nombre);
                                    $('#apellido').val(dato.apellidos);
                                    $('#telefono').val(dato.telefono);
                                    $('#email').val(dato.email);
                                    $('#user').val(dato.usuario);
                                    $('#pass').val(dato.pass);
                                    $('#marca').val(dato.marca);
                                    $('#plazas').val(dato.plazas);
                                    $('#combustible').val(dato.combustible);
                                    $('#matricula').val(dato.matricula);
                                    $("#imagen").attr("src", dato.imagen);
                                    $("#imagenlink").val(dato.imagen);
                                });
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
    function funcionConsultaTrayectosPasajero() {
        //alert('funcionnnnn')
        idusu = 7;
        $('#tablaPasajero').html(' ');
        $('#tablaPasajero').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_pasajero.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaPasajero').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += " \n\
               <th class='origen'>origen</th>\n\
               <th class='destino'>destino</th>\n\
               <th class='fecha_hora'>fecha_hora</th>\n\
               <th class='plazas'>plazas</th>\n\
               <th class='paradas'>paradas</th>\n\
 \n\
               <th class='idusuario'>Eliminar</th>\n\ ";
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

                                    tabla += "<td class='opciones'>";
                                    tabla += "<input id='borrar' data-idBorrar='" + dato.idtrayecto + "' type=image src='../../../../ZASCAR/public_html/img/eliminar.png' width='18' height='15' ></td>";
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
        idusu = 7;
        $('#tablaConductor').html(' ');
        $('#tablaConductor').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_conductor.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaConductor').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += "\n\
               <th class='origen'>origen</th>\n\
               <th class='destino'>destino</th>\n\
               <th class='fecha_hora'>fecha_hora</th>\n\
               <th class='plazas'>plazas</th>\n\
               <th class='paradas'>paradas</th>\n\
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
        idusu = 7;
        $('#tablaPeticiones').html(' ');
        $('#tablaPeticiones').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_peticiones.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaPeticiones').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += "<th class='nombre'>Solicitante</th>\n\
               <th class='origen'>Origen</th>\n\
               <th class='destino'>Destino</th>\n\
               <th class='fecha_hora'>Fecha_Hora</th>\n\
               <th class='idusuario'>Aceptar</th>\n\ ";
                midato = JSON.parse(datos);
                $
                        .each(
                                midato,
                                function (i, dato) {
                                    tabla += "<tr>";
                                   tabla += "<td class='nombre'>" +
                                            dato.nombre +
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
                                    
                                    tabla += "<td class='opciones'>";
                                    tabla += "<input id='aceptar' data-idtrayecto='" + dato.idtrayecto + "' data-idsolic='" + dato.idsolic + "'  type=image src='../../../../ZASCAR/public_html/img/aceptar.png' style='cursor:pointer;' ng-click='modificar()' width='20' height='17'></td>";
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

