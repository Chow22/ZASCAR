<?php
 require_once("../modelo/trayectos.php");
$lista = new Trayectos();
$pd = $lista->listar_trayectos();
require_once("../vista/listarTrayectos.php");
?>
