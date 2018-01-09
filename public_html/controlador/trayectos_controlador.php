<?php

require_once "../modelo/login.php";
$origen = filter_input(INPUT_POST, 'origen');
$destino = filter_input(INPUT_POST, 'destino');
$paradas = filter_input(INPUT_POST, 'paradas');
$diahora = filter_input(INPUT_POST, 'diahora');
$login = new Login();
$pd = $login->comprobar_login($usuario, $pass);
if ($pd == NULL) {
    echo 'ERROR, VUELVA A INTENTARLO CON UN USUARIO VÁLIDO';
    echo ' <br>';
    echo ' <a href="../vista/login.php">Volver</a>';
} else {
    header("Location: ../controlador/usuario_controlador.php");
}