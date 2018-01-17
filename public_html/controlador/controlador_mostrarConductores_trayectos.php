<?php
require_once '../modelo/trayectos.php';
$miId = $_GET['value']; 
$cont = new trayectos();
$mivariable = $cont->mostrar_conductores_trayectos($miId);
$mivariable = json_encode($mivariable);
print($mivariable)
?>
