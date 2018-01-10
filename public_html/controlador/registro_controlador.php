<?php

require_once "../modelo/usuarios.php";
$nombre = filter_input(INPUT_POST, 'nombre');
$apellidos = filter_input(INPUT_POST, 'apellidos');
$telefono = filter_input(INPUT_POST, 'telefono');
$email = filter_input(INPUT_POST, 'email');
$imagen = filter_input(INPUT_POST, 'imagen');
$usuario = filter_input(INPUT_POST, 'usuario');
$pass = filter_input(INPUT_POST, 'pass');
$lista = new usuarios();
$lista->registrarUsuario($nombre, $apellidos, $telefono, $email, $imagen, $usuario, $pass);

