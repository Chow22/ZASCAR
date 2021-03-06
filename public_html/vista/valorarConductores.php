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
        <title>Valora a nuestros conductores</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">                
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <script src="../js/angular.min.js" type="text/javascript"></script>
        <script src="../js/valoraciones.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../css/style.css">   

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
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="valorarConductores.php" class="active">Valora a nuestros conductores</a></li>
                </ul>
            </nav>
        </header>
        <br>
        <br>
        <div ng-controller="mainController" >
            <div align="center">
                <h1>Lista de Usuarios</h1>        
                <br>
                <strong class="strindex">En esta página se muestran los conductores a los que quieras valorar.</strong>
            </div>
            <hr>
            <br>   
            <div class="alineando-botonsito" align= "center">
                <input type="button" class="btn btn-default" value="Buscar" ng-click="Buscar()"> 
            </div>
            <br>          
            <div id="dcha" ng-show="VerMenu === true"> 
                <form id="formulariobuscar" ng-show="VerFormBusqueda" ng-submit="finbuscar()"><h5 style="color:white;">Escriba dato a buscar:</h5> <input type="text" ng-model="TEXTObusqueda"> 
                    <input type="submit" class="btn btn-default" value="Cerrar"/> 
                </form> 
            </div>   
            <div class="valorar" align= "center">
                <div  ng-repeat="item in lista| filter:TEXTObusqueda"class="">                               
                    <div class="tablita-conductora" align= "center">    
                        
                            <div class="">                        
                                <div class="well well-sm" align= "center">                            
                                    <div class="row">                                                            
                                        <div class="col-sm-6 col-md-4">
                                            <img class="imagencitas" src='{{item.imagen}}' alt=""/>
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <div class="datos-conductor">
                                                <br>
                                                <strong>Nombre:</strong><h4>{{item.nombre}}</h4>
                                                <p>                                       
                                                    <strong>Apellidos:</strong><h4>{{item.apellidos}}</h4>
                                                <p>                                           
                                                    <strong>Nombre de Usuario:</strong><h4>{{item.usuario}}</h4>  
                                            </div> 
                                            <br>                                                                              
                                            <div class="botonesLikeDislke">                                                                                                                                
                                                <span>&nbsp;&nbsp;&nbsp;<img src="../img/thumbs-up.png" class="txiki" style="cursor:pointer;" ng-click='positivo($index, item)' alt=""></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span>&nbsp;&nbsp;<img src="../img/thumbs-down.png" class="txiki" style="cursor:pointer;" ng-click='negativo($index, item)' alt=""></span>  
                                                <br> 
                                                <span>&nbsp;&nbsp;&nbsp;{{item.positivo}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;&nbsp;&nbsp;{{item.negativo}}</span>                                                                                                                    
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="contacto.php">Contacto</a>
            <div class="">   
                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
                <a href="https://www.facebook.com"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                <a href="https://twitter.com"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                <a href="https://plus.google.com"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                <a href="mailto:pepa_la@cerda.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
            </div>
        </div>
    </footer>  
</body>
</html>
