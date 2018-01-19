<?php
session_start();
require_once '../modelo/viajes.php';
 $idusu = $_SESSION['idusu'];
 $idtray = $_GET['value'];

$cont = new viajes();
$cont->aceptarPeticion($idusu,$idtray);
//print($idusu);
//print($idtrayecto);
?>
