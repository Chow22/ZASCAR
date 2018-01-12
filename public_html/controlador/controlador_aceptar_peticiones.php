<?php

require_once '../modelo/trayectos.php';
 $idtrayecto = htmlspecialchars(trim($_POST['idtrayecto']));
 $idusu = htmlspecialchars(trim($_POST['idusu']));

$cont = new trayectos();
$cont->aceptarPeticion($idtrayecto,$idusu);
print($idtrayecto);
print($idusu);
?>
