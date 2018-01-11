$(document).ready(function () {
    //alert("entramos al js preparense");
    funcionConsultaTrayectosConductor();

    funcionConsultaTrayectosPasajero();

    funcionPeticiones();

    rellenarDatos();

    //alert("0");
//////////////////eliminar trayecto pasajero/////////////////////////////////////////
    $('#tablaPasajero').on("click", "#borrar", function () {
       // alert('borrando');
        funcionBorrar();
        return false;
    });


    function funcionBorrar() {
        //alert("eliminandoo");
        id = $(this).attr(data.idtrayecto);
        idusu = 7;
        // alert(nombre);
        $.ajax({
            type: 'POST',
            data: "submit=&id=" + id + "&idusu=" + idusu,
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
        alert('boton aceptar ok');
        funcionAceptar();
        return false;
    });


    function funcionAceptar() {
        alert("aceptandoo");
        id = $(this).attr("data-idtrayecto");
        idusu=7;
         alert(id);
        $.ajax({
            type: 'POST',
            data: "submit=&id=" + id + "&idusu=" + idusu ,
            dstaType: 'json',
            url: "../controlador/controlador_aceptar_peticiones.php",
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
        idusu=7;
        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu ,
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
        idusu=7;
        $('#tablaPasajero').html(' ');
        $('#tablaPasajero').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu ,
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
               <th class='idusuario'>Eliminar</th>\n\ ";
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
                                    tabla += "<input id='borrar' type=image src='../../../../ZASCAR/public_html/img/eliminar.png' width='18' height='15' ng-click='modificar()'></td>";
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
        idusu=7;
        $('#tablaConductor').html(' ');
        $('#tablaConductor').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu ,
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
        idusu=7;
        $('#tablaPeticiones').html(' ');
        $('#tablaPeticiones').html('<div><img class="imgCarga" align="center" src="../IMG/carga.svg" width="130" height="130"></></div>');

        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu ,
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
               <th class='idusuario'>Aceptar</th>\n\ ";
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
                                    tabla += "<input id='aceptar' data-idtrayecto='" + dato.idtrayecto +"'  type=image src='../../../../ZASCAR/public_html/img/aceptar.png' style='cursor:pointer;' ng-click='modificar()' width='20' height='17'></td>";
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

