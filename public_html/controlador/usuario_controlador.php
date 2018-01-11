<?php

require_once("../modelo/modelo_usuario.php");
$idusu = htmlspecialchars(trim($_POST['idusu']));
        
$cont = new modelo_usuario();
$datos = $cont->usuarioPorId($idusu);

$usuarios = json_encode($datos);
print $usuarios;
?>
