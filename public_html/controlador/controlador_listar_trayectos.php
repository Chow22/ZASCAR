<?php
require_once("../modelo/trayectos.php");
$cont=new Trayectos();
$datos=$cont->listar_trayectos();

$datos= json_encode($datos); 
 print $datos; 
?>