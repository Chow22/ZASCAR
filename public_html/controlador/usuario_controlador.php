<?php
sleep(1);
require_once("../modelo/modelo_usuario.php");
$cont=new modelo_usuario();
$datos=$cont->get_usuarios();

 $usuarios= json_encode($datos);
   print $usuarios;
?>
