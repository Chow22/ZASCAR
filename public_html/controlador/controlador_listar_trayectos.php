<?php
require_once("../modelo/trayectos.php");
$lista = new trayectos();
$pd = $lista->listar_trayectos();
require_once("../vista/listarTrayectos.php");
?>