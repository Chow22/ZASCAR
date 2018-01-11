<?php

require_once '../modelo/trayectos.php';
 $id = htmlspecialchars(trim($_POST['id']));
 $idusu = htmlspecialchars(trim($_POST['idusu']));

$cont = new trayectos();
$cont->aceptar_peticion($id,$idusu);
print($id);
?>
