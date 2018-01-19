<?php 
require_once("../modelo/modelo_usuario.php");
$cont=new modelo_usuario();
$datos=$cont->mostrar_conductores();

$datos= json_encode($datos); 
 print $datos;  
?>


