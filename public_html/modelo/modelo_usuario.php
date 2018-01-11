<?php

require_once '../conector/conector.php';

class modelo_usuario {

    private $link;
    private $usuario;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->usuario = array();
    }

    public function get_usuarios() {
        $sql = "CALL mostrarUsuarios ()";
        $consulta = $this->link->query($sql);
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->usuario[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->usuario;
    }

       public function usuarioPorId($idusu) {
        $sql = "CALL usuarioPorId ('$idusu')";
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

    public function modificar_usuario($id,$nombre,$apellido,$telefono,$email,$imagen,$user,$pass,$marca,$plazas,$combustible,$matricula) {
        $consulta = $this->link->query("CALL modificarUsuario ('$id','$nombre','$apellido','$telefono','$email','$imagen','$user','$pass','$marca','$plazas','$combustible','$matricula')");
    }

    public function borrar_usuario($idBorrar) {
        $consulta = $this->link->query("CALL borrarUsuario('$idBorrar')");
    }

}

?>
