<?php
session_start();
//Se necesita estar logueado para ver esta pagina
//echo ($_SESSION['loggedin']);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    header('Location: ../vista/nolog.php');

    exit();
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="miAplicacion">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>Buscar Trayectos</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">                
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">   
        <script src="../js/angular.min.js" type="text/javascript"></script>
        <script src="../js/cargarDatosTrayectos.js" type="text/javascript"></script>

    </head>
    <body>
        <header>                 
            <div id="logo"><img src="../img/logo.png" alt="">ZASCAR Enterprises
                <?php
                $now = time();
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $now < $_SESSION['expire']) {
                    echo "<a  href='../controlador/logout.php'><img class='login-img' src='../img/logoutbutton.png'/></a>";
                    echo "<p style='color:white;'>Bienvenido, ";
                    echo "<font color = 'orange'><a  href='miCuenta.php' style='color:orange;'>";
                    echo ($_SESSION['username']);
                    echo"</font></a>";
                    echo "</p>";
                } else {
                    session_destroy();
                    echo"<a  href='../vista/login.php'><img class='login-img' src='../img/loginbutton.png'/></a>";
                    echo "<p>Iniciar sesión</p>";
                }
                ?>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="../index.php" class="active">Home</a></li>
                    <li><a href="informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="valorarConductores.php">Valora a nuestros conductores</a></li>
                </ul>
            </nav>
        </header>
        <br>
        <br>
        <div align="center" ng-controller="mainController">
            <h1>Lista de trayectos</h1>        
            <br>             
            <strong class="strindex">Aquí se muestra una lista de los trayectos a los que te puedes agregar o puedes mostrar la informacion del conductor.
                El icono <img src="../img/infobutton.png" alt="" width="15px" height="15px"/> muestra la informacion del conductor que ha publicado el trayecto, el icono
                <img src="../img/acceptbutton.png" alt="" width="15px" height="15px"/> manda la peticion al conductor que ha publicado el trayecto que te interesa. La página también dispone de un buscador en el que podras filtrar tu búsqueda según tus preferencias, ya sea por origen, destino, fecha u hora, plazas, paradas, etc....
            </strong>
            <hr>
            <br>   
            <div class="alineando-botonsito2">           
                <input type="button" class="btn btn-default" value="Buscar" ng-click="Buscar()"> 
            </div>      
            <br>
            <div id="alineando-buscador2" ng-show="VerMenu === true"> 
                <form id="formulariobuscar" ng-show="VerFormBusqueda" ng-submit="finbuscar()"><p class="texto-buscador2">Escriba dato a buscar:</p> <input type="text" ng-model="TEXTObusqueda"> 
                    <input type="submit" class="btn btn-default" value="Cerrar"> 
                </form> 
            </div>     
            <div class="margeneslista">
                <div class="container">
                    <div class="listWrap">
                        <tr ng-repeat="item in lista| filter:TEXTObusqueda">
                        <ul class="list">
                            <li>
                                <span>Origen</span>
                                <span>Destino</span>
                                <span>Fecha/Hora</span>
                                <span>Plazas</span>
                                <span>Paradas</span>                           
                                <span></span>    
                                <span></span>
                            </li>                            
                            <li ng-class="{plazasACero:item.plazas == 0}" ng-repeat="item in lista| filter:TEXTObusqueda">
                                <h1 hidden> {{item.idtrayecto}}</h1>
                                <span class="tabla-campos2">{{item.origen}}</span>
                                <span class="tabla-campos2">{{item.destino}}</span>
                                <span>{{item.fecha_hora}}</span>
                                <span>{{item.plazas}}</span>                                
                                <span class="tabla-campos" width="100px">{{item.paradas}}</span> 
                                <span></span>
                                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                    <span> <img src="../img/infobutton.png" class="txiki" style="cursor:pointer;" ng-click='infor($index, item)' alt="" >
                                        <img src="../img/acceptbutton.png" class="txiki" style="cursor:pointer;" ng-click='peticion($index, item)' alt="" ></span>
                                </div>
                            </li>                         
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../vista/contacto.php">Contacto</a></p>
        </footer> 
    </body>
</html>
