<?php
session_start();
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
        <script src="../js/valoraciones.js" type="text/javascript"></script>

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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="#" class="active">Valora a nuestros conductores</a></li>
                </ul>
            </nav>
        </header>
        <br>
        <br>
        <div align="center" ng-controller="mainController">
            <h1>Lista de Usuarios</h1>        
            <br>
           <strong class="strindex">En esta página se muestran los conductores a los que quieras valorar.</strong>
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
                    <table class="tabla-votar"> 
                        <tr>
                            <th hidden>IdUSuario</th>
                            <th>Perfil</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>                           
                            <th>Usuario</th>
                            <th>Positivos</th>    
                            <th>Negativos</th>
                            <th>Tu Voto</th>
                        </tr>
                        <tr ng-repeat="item in lista| filter:TEXTObusqueda">
                            <td class="medio" hidden>{{item.idusuario}}</td>
                            <td class="grande"><img src='{{item.imagen}}'width='70' height='70'/></td>                            
                            <td class="peque">{{item.nombre}} </td>
                            <td class="medio">{{item.apellidos}} </td>                            
                            <td class="medio">{{item.usuario}} </td>
                            <td class="medio">{{item.positivo}}</td>
                            <td class="medio">{{item.negativo}}</td>
                            <td class="peque"><span> <img src="../img/thumbs-up.png" class="txiki" style="cursor:pointer;" ng-click='positivo($index, item)' alt="">                                  
                            <img src="../img/thumbs-down.png" class="txiki" style="cursor:pointer;" ng-click='negativo($index, item)' alt=""></span> </td>
                        </tr>                   
                    </table>                                  
                </div>
            </div>
        </div>
    </body>
</html>