<?php

require_once '../conector/conector.php';

class trayectos {

    private $link;
    private $usuario;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->usuario = array();
    }

    public function get_trayectoConductor($idusu) {
        $sql = "CALL verTrayectosConductor('$idusu')";
        $consulta = $this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->usuario[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->usuario;
    }

    public function get_trayectoPasajero($idusu) {
        $sql = "CALL verTrayectosPasajero('$idusu')";
        $consulta = $this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->usuario[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->usuario;
    }

    public function get_trayectoPeticiones($idusu) {
        $sql = "CALL verPeticiones('$idusu')";
        $consulta = $this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->usuario[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->usuario;
    }

    public function listar_trayectos() {
        $sql = "CALL listarTrayecto()";
        $consulta = $this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->usuario[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->usuario;
    }
      public function mostrar_conductores_trayectos($miId) {
        $sql = "CALL mostrar_conductores_trayectos('$miId')";
        $consulta = $this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->usuario[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->usuario;
    }

    public function borrarTrayectoPasajero($id, $idusu) {
        $consulta = $this->link->query("CALL borrarTrayectoPasajero ('$id','$idusu')");
    }

    public function aceptarPeticion($idtrayecto, $idusu) {
        $consulta = $this->link->query("CALL aceptarPeticion ('$idtrayecto','$idusu')");
    }

    public function insertar_trayecto($origen, $destino, $fechahora, $plazas, $paradas, $id) {
        $consulta = $this->link->query("CALL sp_insertar_trayecto ('$origen','$destino','$fechahora','$plazas','$paradas','$id')");
    }

}

?>
