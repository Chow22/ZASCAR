<?php

require_once 'conector.php';

class trayectos {

    private $link;
    private $usuario;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->usuario = array();
    }

    public function registrarUsuario($nombre, $apellidos, $telefono, $email, $usuario, $pass, $imagen) {
        $consulta = $this->link->query("CALL spRegistrarUsuario('$nombre','$apellidos','$telefono','$email','$usuario','$pass',$imagen')");
        $consulta->free_result();
    }

}
