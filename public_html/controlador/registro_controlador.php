<?php
require_once "../modelo/modelo_usuario.php";
$nombre = htmlspecialchars(trim($_POST['nombre']));
$apellidos = htmlspecialchars(trim($_POST['apellidos']));
$telefono = htmlspecialchars(trim($_POST['telefono']));
$email = htmlspecialchars(trim($_POST['email']));
$imagen = htmlspecialchars(trim($_POST['imagen']));
$usuario = htmlspecialchars(trim($_POST['usuario']));
$pass = htmlspecialchars(trim($_POST['pass']));
$lista = new modelo_usuario();
$lista->registrar_usuario($nombre, $apellidos, $telefono, $email, $imagen, $usuario, $pass);

echo "<script type=\"text/javascript\">alert(\"Resgistro satisfactorio\");</script>";  
header('Location: ../index.php'); 
?>