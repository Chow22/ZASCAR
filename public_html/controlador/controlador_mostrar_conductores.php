<?php 
require_once("../modelo/usuarios.php");
$cont=new modelo_usuario();
$datos=$cont->get_usuarios();

$datos= json_encode($datos); 
 print $datos;  
?>


