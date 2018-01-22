<?php
require_once '../modelo/modelo_usuario.php';
 $idUsu = $_GET['value'];

$cont = new modelo_usuario();
$cont->mostrar_conductores();
print($cont)
?>
<!--session_start();
require_once '../modelo/modelo_usuario.php';
 $idusu = $_SESSION['idusu'];
 $idconductor = $_GET['value'];-->
