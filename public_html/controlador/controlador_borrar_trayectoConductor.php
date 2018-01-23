<?php

require_once '../modelo/trayectos.php';
$idusu = htmlspecialchars(trim($_POST['idusu'])); 
$idtrayecto = htmlspecialchars(trim($_POST['idtrayecto']));

$cont = new trayectos();
$cont->borrarTrayectoConductor($idusu,$idtrayecto);
header('Location: ../vista/consultarTrayectos.php')
?>
