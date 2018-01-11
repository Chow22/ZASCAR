<?php

require_once '../modelo/trayectos.php';
 $idtrayecto = htmlspecialchars(trim($_POST['idtrayecto']));
 $idusu = htmlspecialchars(trim($_POST['idusu']));

$cont = new trayectos();
$cont->aceptar_peticion($idtrayecto,$idusu);
print($idtrayecto);
?>
