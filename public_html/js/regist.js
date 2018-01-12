$(document).ready(function () {
    esconder();
    // GESTION DE RESGISTRO DE REGISTRO
    $('#mostrarRegistro').click(function () {
        alert('Registro');
        $('#zonaReg').show();      
    });

    // funciones generales esconder registro
    function esconder() {
        $('#zonaReg').hide();
    }
});


