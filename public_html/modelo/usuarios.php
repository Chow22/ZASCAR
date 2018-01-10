<?php

require_once '../conector/conector.php';

class usuarios {

    private $link;
    private $usuario;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->usuario = array();
    }

    public function registrarUsuario($nombre, $apellidos, $telefono, $email, $imagen, $usuario, $pass) {
        $consulta = $this->link->query("CALL spRegistrarUsuario('$nombre','$apellidos','$telefono','$email',$imagen','$usuario','$pass')");
    }

}
