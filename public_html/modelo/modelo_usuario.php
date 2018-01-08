<?php

require_once '../controlador/conector.php';

class modelo_usuario {

    private $link;
    private $usuario;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->usuario = array();
    }

    public function get_usuarios() {
        $sql = "CALL verIkasleak ()";
        $consulta = $this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->usuario[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->usuario;
    }

    public function insertar_usuario($nombre, $apellido1, $apellido2, $ciclo, $curso) {
        $consulta = $this->link->query("CALL aniadirUsuario ('$nombre','$apellido1','$apellido2','$ciclo','$curso')");
        $row = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
        $this->id = $row['id'];
    }

    public function modificar_usuario($id, $nombre, $apellido1, $apellido2, $ciclo, $curso) {
        $consulta = $this->link->query("CALL modificarUsuario ('$id','$nombre','$apellido1','$apellido2','$ciclo','$curso')");
    }

    public function borrar_usuario($idBorrar) {
        $consulta = $this->link->query("CALL borrarUsuario('$idBorrar')");
    }

}

?>
