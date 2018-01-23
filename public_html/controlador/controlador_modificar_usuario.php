<?php

require_once '../modelo/modelo_usuario.php';
 $id = htmlspecialchars(trim($_POST['id']));
 $nombre = htmlspecialchars(trim($_POST['nombre']));
 $apellido = htmlspecialchars(trim($_POST['apellido']));
 $telefono = htmlspecialchars(trim($_POST['telefono']));
 $email = htmlspecialchars(trim($_POST['email']));
 $imagen = htmlspecialchars(trim($_POST['imagen']));
 $user = htmlspecialchars(trim($_POST['user']));
 $pass = htmlspecialchars(trim($_POST['pass']));
 $marca = htmlspecialchars(trim($_POST['marca']));
 $plazas = htmlspecialchars(trim($_POST['plazas']));
 $combustible = htmlspecialchars(trim($_POST['combustible']));
 $matricula = htmlspecialchars(trim($_POST['matricula']));
 
$cont = new modelo_usuario();
$cont->modificar_usuario($id,$nombre,$apellido,$telefono,$email,$imagen,$user,$pass,$marca,$plazas,$combustible,$matricula);
//print($combustible);
?>
