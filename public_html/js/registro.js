function Envio() {
    if ((Correo() && Clave())) {
        return true;
    } else {
        return false;
    }
}
function Correo() {
    var miCorreo = document.registro.email.value;
    if (/\w+\@\w+\.\w+/.test(miCorreo)) { //EXPRESIÓN REGULAR
//        alert("Correo Correcto");
        return true;
    } else {
        alert("Correo Incorrecto");
        return false;
    }
}
function Clave() {
    var clav1 = document.getElementById("clave1");
    var clav2 = document.getElementById("clave2");
    if ((clav1.value === "") || (clav1.value !== clav2.value)) {
        alert("Las contraseñas no coinciden");
        return false;
    } else {
        // alert("Claves Correctas");
        return true;
    }
}
function SoloNumeros(e) {
    var keychar;
    var teclanum;
    teclanum = e.which; //codigo ASCII de la tecla pulsada
    keychar = String.fromCharCode(teclanum); //transformacion de codigo ASCII al String
//    alert("teclanum " + teclanum);
//    alert("keychar " + keychar);
    //caracter pulsado
    if (keychar < "0" || keychar > "9") {
        return false;
    } else {
        return true;
    }
}
function ComprobarArroba(e) { //Evitar doble @ en una caja de texto.
    var caracterTecla;
    var codigoTecla;

    if (window.event) { //IE8 and earlier
        codigoTecla = e.keyCode;
    } else if (e.which) { //IE9/Firefox/Chrome/Opera/Safari
        codigoTecla = e.which;
    }
    //alert("keyCode " + codigoTecla);
    caracterTecla = String.fromCharCode(codigoTecla);
    //alert("caractertecla " + caracterTecla);
    //solo una @
    if (caracterTecla === "@") {
        if (document.registro.email.value.indexOf('@') >= 0) {
            return false;
        }
    }
}