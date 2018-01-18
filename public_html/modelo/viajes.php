<?php

require_once '../conector/conector.php';
class viajes {

    private $link;
    private $usuario;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->usuario = array();
    }

    public function aceptarPeticion($idusu,$idtray) {
        $sql = "CALL mandarPeticiones('$idusu','$idtray')";
        $consulta = $this->link->query($sql);
        }
    
    }
?>
