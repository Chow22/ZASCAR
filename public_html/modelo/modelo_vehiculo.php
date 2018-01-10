<?php

require_once '../conector/conector.php';

class modelo_vehiculo {

    private $link;
    private $respuesta;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->respuesta = array();
    }

    public function insertar_vehiculo($marca, $plazas, $combustible, $matricula) {
        $sql = "CALL sp_insertar_vehiculo('$marca','$plazas','$combustible','$matricula')";
        $this->link->query($sql);
        // $consulta->free_result();
        $this->link->close();
        return $this->respuesta;
    }

}
