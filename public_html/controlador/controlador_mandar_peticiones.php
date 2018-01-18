<?php

session_start();
require_once '../modelo/viajes.php';
 $idusu = ($_SESSION['idusu']);
 $idtray = $_GET['idtrayecto'];
print($idusu);
print($idtray);
//$cont = new viajes();
//$cont->aceptarPeticion($idusu,$idtray);
//print($idusu);
//print($idtrayecto);
?>
