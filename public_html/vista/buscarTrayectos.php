<?php
session_start();
//Se necesita estar logueado para ver esta pagina
//echo ($_SESSION['loggedin']);
//if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//
//} else {
//    header('Location: ../vista/nolog.php');
//
//    exit();
//}
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
                    echo "<font color = 'orange'>";
                    echo ($_SESSION['username']);
                    echo"</font>";
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
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="../informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
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
            <input type="button" value="Buscador" ng-click="Buscar()"> 
            <br>
            <br>
            <div id="dcha" ng-show="VerMenu === true"> 
                <form id="formulariobuscar" ng-show="VerFormBusqueda" ng-submit="finbuscar()">Escriba dato a buscar: <input type="text" ng-model="TEXTObusqueda"> 
                    <input type="submit" value="Buscar"/> 
                </form> 
            </div>           
            <div id="zonalista">  
                <div id="listatrayectos">                    
                    <table class="tabla-buscar"> 
                        <tr>                            
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Fecha/Hora</th>
                            <th>Plazas</th>
                            <th>Paradas</th>    
                            <th>Acciones</th>                            
                        </tr>
                        <tr ng-style="" ng-repeat="item in lista| filter:TEXTObusqueda">
                            <td class="peque" hidden> {{item.idtrayecto}} </td>
                            <td class="peque"> {{item.origen}} </td>
                            <td class="medio"> {{item.destino}} </td>
                            <td class="medio"> {{item.fecha_hora}}</td>
                            <td class="medio"> {{item.plazas}} </td>
                            <td class="grande"> {{item.paradas}}   </td>
                            <td class="peque"><span> <img src="../img/infobutton.png" class="txiki" style="cursor:pointer;" ng-click='infor($index, item)' alt="" >&nbsp;
                            <span class="peque"><img src="../img/acceptbutton.png" class="txiki" style="cursor:pointer;" ng-click='peticion($index, item)' alt="" ></span></td>
                        </tr>                   
                    </table>                                  
                </div>
            </div>
        </div>
    </body>
</html>