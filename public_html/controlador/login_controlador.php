<?php
require_once("../modelo/login.php");
$usuario = filter_input(INPUT_POST, 'usuario');
$pass = filter_input(INPUT_POST, 'pass');
$login = new Login();
$pd = $login->comprobar_login($usuario, $pass);
if ($pd == NULL) {
    echo 'ERROR, VUELVA A INTENTARLO CON UN USUARIO VÁLIDO';
    echo ' <br>';
    echo ' <a href="../vista/login.php">Volver</a>';
} else {
    header("Location: ../index.php");
}
?>