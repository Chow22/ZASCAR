$(document).ready(function () {
//alert("entramos al js preparense");
    idtrayecto = 0;
    idsolic = 0;
    idBorrar = 0;
    funcionConsultaTrayectosPasajero();
    rellenarDatos();
    $('#pasa').addClass('active');

    //alert("0");
    //
    //////////////////Botones pestañas tablas /////////////////////////////////////////
    $('#Pasajero').click(function () {
        //alert("boton Pasajero");
        funcionConsultaTrayectosPasajero();
        setInterval(funcionConsultaTrayectosPasajero, 120000);
        $('#pasa').addClass('active');
        $('#conduc').removeClass();
        $('#petic').removeClass();
        return false;
    });

    $('#Conductor').click(function () {
        //alert("boton Conductor");
        funcionConsultaTrayectosConductor();
        setInterval(funcionConsultaTrayectosConductor, 120000);
        $('#pasa').removeClass();
        $('#conduc').addClass('active');
        $('#petic').removeClass();
        return false;
    });

    $('#Peticiones').click(function () {
        //alert("boton Peticiones");
        funcionPeticiones();
        setInterval(funcionPeticiones, 120000);
        $('#pasa').removeClass();
        $('#conduc').removeClass();
        $('#petic').addClass('active');
        return false;
    });





    //////////////////eliminar Cuenta/////////////////////////////////////////
    $('#borrarCuenta').click(function (e) {
        var mensaje = confirm("¿Estas seguro? \n Perderas todos tus datos,trayectos incluidos");
        if (mensaje) {
            alert("¡Hasta nunca!, Satan ira en tu búsqueda por borrar tu cuenta >:[ ");
            idusu = $('#idusuSession').text();
            $.ajax({
                type: 'POST',
                data: "submit=&idusu=" + idusu,
                dstaType: 'json',
                url: "../controlador/controlador_borrar_cuenta.php",
                success: function (datos) {
                    alert("Se ha eliminado con exito");
                    //alert(datos);
                    window.location.href = "../vista/index.php";
                },
                error: function (xhr) {
                    alert("An error occured: " + xhr.status +
                            " " + xhr.statusText);
                }
            });
        } else {
            alert("Gracias por volver a confiar en nosotros, te amamos mucho! ♥♥♥");
        }
    });



//////////////////eliminar trayecto pasajero/////////////////////////////////////////
    $('#tablaDinamica').on("click", "#borrar", function () {
 alert('borrando');
        idBorrar = $(this).attr("data-idBorrar");
        funcionBorrar();
        return false;
    });
    function funcionBorrar() {
        alert("eliminandoo");

        idusu = $('#idusuSession').text();
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
    $('#tablaDinamica').on("click", "#aceptar", function () {
//alert('boton aceptar ok');
        idtrayecto = $(this).attr("data-idtrayecto");
        idsolic = $(this).attr("data-idsolic");
        //alert(idtrayecto);
        funcionAceptar();
        return false;
    });
    function funcionAceptar() {

        idusu = $('#idusuSession').text();
        //alert(idtrayecto);
        //alert(idsolic);

        $.ajax({
            type: 'POST',
            data: "submit=&idtrayecto=" + idtrayecto + "&idusu=" + idsolic,
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
        idusu = $('#idusuSession').text();
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
        //alert(combustible);
        $.ajax({
            type: 'POST',
            data: "submit=&id=" + idusu + "&nombre=" + nombre + "&apellido=" + apellido + "&telefono=" + telefono + "&email=" + email + "&imagen=" + imagen + "&user=" + user + "&pass=" + pass + "&marca=" + marca + "&plazas=" + plazas + "&combustible=" + combustible + "&matricula=" + matricula,
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
        // alert($('#idusuSession').text());
        idusu = $('#idusuSession').text();
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
        idusu = $('#idusuSession').text();
        $('#tablaDinamica').html(' ');
        $('#tablaDinamica').html('<div><img class="imgCarga" align="center" src="../img/carga.svg" width="130" height="130"></></div>');
        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_pasajero.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaDinamica').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += " \n\
               <th class='origen'>Origen</th>\n\
               <th class='origen'>Telefono conductor</th>\n\
               <th class='destino'>Destino</th>\n\
               <th class='fecha_hora'>Fecha-Hora</th>\n\
               <th class='plazas'>Plazas</th>\n\
               <th class='paradas'>Paradas</th>\n\
               <th class='aceptado'>Aceptado</th>\n\
               <th class='idusuario'>Eliminar</th>\n\ ";
                midato = JSON.parse(datos);
                $
                        .each(
                                midato,
                                function (i, dato) {
                                    tabla += "<tr data-aceptado='" + dato.aceptado + "' id='linea' >";
                                    tabla += "<td class='origen'>" +
                                            dato.origen +
                                            "</td>";
                                    tabla += "<td class='telefono'>" +
                                            dato.telefono +
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
                                    tabla += "<td class='aceptado'>" + dato.aceptado +
                                            "</td>";
                                    tabla += "<td class='opciones'>";
                                    tabla += "<input id='borrar' data-idBorrar='" + dato.idtrayecto + "' type=image src='../img/eliminar.png' width='18' height='15' ></td>";
                                    tabla += "</tr>";
                                });
                tabla += "</table>";
                //  alert(tabla)

                $('#tablaDinamica').append(tabla).hide()
                        .fadeIn('slow');
                //////////////////colorear linear tr/////////////////////////////////////////
                $('#tablaDinamica tr').each(function () {

                    if ($(this).attr('data-aceptado') === '0') {
                        $(this).css('background-color', 'rgba(243, 31, 31, 0.4)');
                    } else if ($(this).attr('data-aceptado') === '1') {
                        $(this).css('background-color', 'rgba(102, 243, 31, 0.4)');
                    }

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
    function funcionConsultaTrayectosConductor() {
        //alert('funcionnnnn')
        idusu = $('#idusuSession').text();
        $('#tablaDinamica').html(' ');
        $('#tablaDinamica').html('<div><img class="imgCarga" align="center" src="../img/carga.svg" width="130" height="130"></></div>');
        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_conductor.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaDinamica').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += "\n\
               <th class='origen'>Origen</th>\n\
               <th class='destino'>Destino</th>\n\
               <th class='fecha_hora'>Fecha-Hora</th>\n\
               <th class='plazas'>Plazas</th>\n\
               <th class='paradas'>Paradas</th>\n\
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
                $('#tablaDinamica').append(tabla).hide()
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
        idusu = $('#idusuSession').text();
        $('#tablaDinamica').html(' ');
        $('#tablaDinamica').html('<div><img class="imgCarga" align="center" src="../img/carga.svg" width="130" height="130"></></div>');
        $.ajax({
            type: 'POST',
            data: "submit=&idusu=" + idusu,
            dstaType: 'json',
            url: "../controlador/controlador_consulta_trayectos_peticiones.php",
            success: function (datos) {
                //  alert(datos)
                $('#tablaDinamica').fadeIn(1000).html("");
                var tabla = "<br> \n\
              <table class='tabla'>";
                tabla += "<th class='nombre'>Solicitante</th>\n\
               <th class='telefono'>Telefono</th>\n\
               <th class='origen'>Origen</th>\n\
               <th class='destino'>Destino</th>\n\
               <th class='fecha_hora'>Fecha-Hora</th>\n\
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
                                    tabla += "<td class='telefono'>" +
                                            dato.telefono +
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
                                    tabla += "<input id='aceptar' data-idtrayecto='" + dato.idtrayecto + "' data-idsolic='" + dato.idsolic + "'  type=image src='../img/aceptar.png' style='cursor:pointer;' ng-click='modificar()' width='20' height='17'></td>";
                                    tabla += "</tr>";
                                });
                tabla += "</table>";
                //  alert(tabla)
                $('#tablaDinamica').append(tabla).hide()
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



