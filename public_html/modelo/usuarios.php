<?php

require_once '../conector/conector.php';

class usuario {

    private $link;
    private $usuario;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->usuario = array();
    }

    public function registrar_usuario($nombre, $apellidos, $telefono, $email, $imagen, $usuario, $pass) {
        $this->link->query("CALL spRegistrarUsuario('$nombre','$apellidos','$telefono','$email','$imagen','$usuario','$pass')");
    }

}
