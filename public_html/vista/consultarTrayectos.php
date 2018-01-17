<!-- Codigo para permitir acceso a usuarios logueados solamente -->
<?php
session_start();
//echo ($_SESSION['loggedin']);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='../vista/login.php'>Login</a>";
    echo "<br><br><a href='../vista/registro.php'>Registrarme</a>";

    exit();
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="miAplicacion">
    <head>
        <title>Nuevo trayecto</title>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link rel="canonical" href="http://html5-templates.com/" />       
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../js/angular.min.js" type="text/javascript"></script>
        <script src="../js/cargarDatosTrayectos.js" type="text/javascript"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>    
    </head>
    <body>
        <header>                         
            <div id="logo"><img src="../img/logo.png">ZASCAR Enterprises 
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
                    echo"<a  href='login.php'><img class='login-img' src='../img/loginbutton.png'/></a>";
                    echo "<p>Iniciar sesión</p>";
                }
                ?>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                </ul>

            </nav>
        </header>
        <br/>
        <br/>
        <div align="center" ng-controller="mainController">
           <h1>Trayectos añadidos por <?php echo ($_SESSION['username']) ?></h1>      
            <br>
            <strong class="strindex">Aquí se muestra una lista de tus trayectos publicados.</strong>
            <hr>
            <br>               
<!--            <input type="button" value="Buscador" ng-click="Buscar()"> 
            <br>
            <br>
            <div id="dcha" ng-show="VerMenu === true"> 
                <form id="formulariobuscar" ng-show="VerFormBusqueda" ng-submit="finbuscar()">Escriba dato a buscar: <input type="text" ng-model="TEXTObusqueda"> 
                    <input type="submit" value="Buscar"/> 
                </form> 
            </div>           -->
            <div id="zonalista">  

                <div id="listatrayectos">                    
                    <table class="chenzira"> 
                        <tr>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Fecha/Hora</th>
                            <th>Plazas</th>
                            <th>Paradas</th>    
                            <th>Acciones</th>
                            <th></th>
                        </tr>
                        <tr ng-repeat="item in lista| filter:TEXTObusqueda">
                            <td class="peque"> {{item.origen}} </td>
                            <td class="medio"> {{item.destino}} </td>
                            <td class="medio"> {{item.fecha_hora}}</td>
                            <td class="medio"> {{item.plazas}} </td>
                            <td class="grande"> {{item.paradas}}   </td>
                            <td class="peque"><span> <img src="../img/eliminar.png" class="txiki" style="cursor:pointer;" ng-click='infor($index, item)' alt="" ></td>
                        </tr>                   
                    </table>             
                </div>

            </div>
        
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../contacto.php">Contacto</a></p>
        </footer>
    </body>
</html>