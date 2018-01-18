<?php
require_once '../modelo/modelo_usuario.php';
$cont = new modelo_usuario();
$cont->mostrar_conductores();
print($cont)
?>
