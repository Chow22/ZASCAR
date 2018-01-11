<?php

require_once 'conector.php';

class Login {

    private $login;
    private $link;

    public function __construct() {
        $this->link = Conectar::conexion();
        $this->login = array();
    }

    private function set_names() { // funtzio honek � eta tildeak konpontzen ditu                           //query baten emaitza funtzio honekin filtratzen da.  
        return $this->link->query("SET NAMES 'utf8'");
    }

    public function comprobar_login($usuario, $pass) {
        self::set_names();
        $sql = "select idusuario from usuarios where usuario='$usuario' AND pass='$pass'";
        $result = $this->link->query($sql); // result-en jaso diren emaitzak filtratzen ditu
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $this->login[] = $row; // login array-an result-eko filak banan banan gordetzen dira. 
        }
        $result->free_result();
        $this->link->close();
        return $this->login;
    }

}

?>