<?php
require_once("../modelo/modelo_usuario.php");
$cont=new modelo_usuario();
$datos=$cont->usuarioPorId();

 $usuarios= json_encode($datos);
   print $usuarios;
?>
