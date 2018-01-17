<?php

require_once '../modelo/modelo_usuario.php';
 $idusu = htmlspecialchars(trim($_POST['idusu']));
$cont = new modelo_usuario();
$cont->borrarCuenta($idusu);
print($idusu);
?>
