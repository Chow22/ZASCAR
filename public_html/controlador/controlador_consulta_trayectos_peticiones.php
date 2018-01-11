<?php

sleep(1);
require_once("../modelo/trayectos.php");
 $idusu = htmlspecialchars(trim($_POST['idusu']));

$cont = new trayectos();
$datos = $cont->get_trayectoPeticiones($idusu);

$trayectos = json_encode($datos);
print $trayectos;
?>
