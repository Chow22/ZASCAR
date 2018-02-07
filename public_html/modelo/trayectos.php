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

    public function borrarTrayectoConductor($idusu, $idtrayecto) {
        $consulta = $this->link->query("CALL borrarTrayectoConductor ('$idusu','$idtrayecto')");
    }

    public function aceptarPeticion($idtrayecto, $idusu) {
        $consulta = $this->link->query("CALL aceptarPeticion ('$idtrayecto','$idusu')");
    }

    public function insertar_trayecto($origen, $destino, $fechahora, $plazas, $paradas, $id) {
        $consulta = $this->link;
        $consulta->autocommit(false);
        $stop = false;

        $sql1 = "INSERT INTO trayecto (origen, destino, fecha_hora, plazas, paradas, idusuario) 
                VALUES ('$origen', '$destino', '$fechahora', '$plazas', '$paradas', '$id');";
        $sql2 = "INSERT INTO viajes (idusuario, idtrayecto, clase, aceptado) 
            VALUES ('$id', LAST_INSERT_ID(), 'conductor', '1');";

        $result = $consulta->query($sql1); //intento primer query
        if ($consulta->errno) {
            $stop = true; //si hay error entra aqui y para
            echo "Error sql1: " . $consulta->error . ". ";
        }
        $result = $consulta->query($sql2); //intento de hacer segudo query
        if ($consulta->errno) {
            $stop = true; //si hay error entra aqui y para
            echo "Error sql2: " . $consulta->error . ". ";
        }
        if ($stop == false) { //si no hay ningun error have la consulta en la BD
            $consulta->commit();
            echo "Los datos de han guardado correctamente";
        } else {
            $consulta->rollback(); //si hay error anula todas
            echo "No se han metido datos en la BD";
        }
    }

}

?>
