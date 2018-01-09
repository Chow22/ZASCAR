<?php
require_once 'conector.php';
class trayectos{
    private $link;
    private $usuario;

    public function __construct(){
        $this->link=Conectar::conexion();
        $this->usuario=array();
         }

    public function get_trayectoConductor(){
       $sql="CALL verTrayectosConductor(7)";
       $consulta=$this->link->query($sql);
         while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC))
           {
            $this->usuario[]=$row;
           }
       $consulta->free_result();
       $this->link->close();
       return $this->usuario;
      }
      
      public function get_trayectoPasajero(){
       $sql="CALL verTrayectosPasajero(7)";
       $consulta=$this->link->query($sql);
         while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC))
           {
            $this->usuario[]=$row;
           }
       $consulta->free_result();
       $this->link->close();
       return $this->usuario;
      }
      
            public function get_trayectoPeticiones(){
       $sql="CALL verPeticiones(7)";
       $consulta=$this->link->query($sql);
         while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC))
           {
            $this->usuario[]=$row;
           }
       $consulta->free_result();
       $this->link->close();
       return $this->usuario;
      }
      
    public function insertar_pelicula($titulo,$anyo,$director,$cartel){
        $consulta=$this->link->query("CALL spInsertarPelicula('$titulo','$anyo','$director','$cartel')");

    }

public function borrar_pelicula($idBorrar){
        $consulta=$this->link->query("CALL spBorrarPelicula ('$idBorrar')");

    }

public function modificar_pelicula($id,$titulo,$anyo,$director){
     $consulta=$this->link->query("CALL modificarPeliculas ('$id','$titulo','$anyo','$director')");
     print("CALL modificarPeliculas ('$id','$titulo','$anyo','$director')");
}
public function aceptar_peticion($idtrayecto){
        $consulta=$this->link->query("CALL aceptarPeticion ('$idtrayecto')");

    }
 }
?>
