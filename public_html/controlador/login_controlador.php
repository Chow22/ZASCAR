<?php
require_once("../modelo/login.php");
$usuario = filter_input(INPUT_POST, 'usuario');
$pass = filter_input(INPUT_POST, 'pass');
$login = new Login();
$pd = $login->comprobar_login($usuario, $pass);
print($pd);
if($pd=!null) {

    $_SESSION['loggedin'] = true;
    $_SESSION['idusu'] = $idusu;
    $_SESSION['username'] = $usuario;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    // acceso permitido
    echo 'Iniciando sesi�n para ' . $_SESSION['usuario'] . ' <p>';
    echo '<script> window.location="../vista/miCuenta.php"; </script>';
    
    // acceso bloqueado y redireccionamiento al formulario
} else {
    echo '<script> alert("Usuario o contrase\u00F1a incorrectos.");</script>';
    echo '<script> window.location="../vista/miCuenta.php"; </script>';
}
?>