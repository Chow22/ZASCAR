<?php
require_once '../modelo/modelo_usuario.php';
 $idUsu = $_GET['value'];

$cont = new modelo_usuario();
$cont->enviar_valoracion_negativa($idUsu);
//print($cont)
?>

