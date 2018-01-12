<?php
require_once("../modelo/trayectos.php");
$lista = new trayectos();
$pd = $lista->listar_trayectos();
$pd = json_encode($pd);
print($pd);
?>