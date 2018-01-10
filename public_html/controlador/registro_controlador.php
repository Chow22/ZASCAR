<?php

require_once("../modelo/usuarios.php");
$lista = new Usuarios();
$nombre = filter_input(INPUT_POST, 'nombre');
$nombre = "'" . $nombre . "'";
$apellidos = filter_input(INPUT_POST, 'apellidos');
$apellidos = "'" . $apellidos . "'";
$telefono = filter_input(INPUT_POST, 'telefono');
$email = filter_input(INPUT_POST, 'email');
$email = "'" . $email . "'";
$usuario = filter_input(INPUT_POST, 'usuario');
$usuario = "'" . $usuario . "'";
$pass = filter_input(INPUT_POST, 'grupo3');
$pass = "'" . $pass . "'";
$imagen = filter_input(INPUT_POST, 'imagen');
$lista->registrarUsuario($nombre, $apellidos, $telefono, $email, $imagen, $usuario, $pass);

header("Location: ../controlador/usuarios_controlador.php");
