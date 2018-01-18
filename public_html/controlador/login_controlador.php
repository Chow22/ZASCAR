<?php
session_start();
?>
<?php
require_once("../modelo/login.php");
$usuario = filter_input(INPUT_POST, 'usuario');
$pass = filter_input(INPUT_POST, 'pass');
$login = new Login();
$pd = $login->comprobar_login($usuario, $pass);
$idusu=0;
for ($i = 0; $i < count($pd); $i++) {
    $idusu= $pd [$i]["idusuario"];
}
//print($idusu);
if($idusu!=null) {

    $_SESSION['loggedin'] = true;
    $_SESSION['idusu'] = $idusu;
    $_SESSION['username'] = $usuario;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);

    // acceso permitido
    echo 'Iniciando sesion para ' . $_SESSION['username'] . ' <p>';
    echo '<script> window.location="../vista/index.php"; </script>';
    
    // acceso bloqueado y redireccionamiento a la pagina de login
} else {
    $_SESSION['loggedin'] = false;
    echo '<script> alert("Usuario o contrase\u00F1a incorrectos.");</script>';
    echo '<script> window.location="../vista/login.php"; </script>';
}
?>