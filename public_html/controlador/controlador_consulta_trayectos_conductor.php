<?php
sleep(1);
require_once("../modelo/trayectos.php");
$cont=new trayectos();
$datos=$cont->get_trayectoConductor();

 $trayectos= json_encode($datos);
   print $trayectos;
?>