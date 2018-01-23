<?php
session_start();
//Se necesita estar logueado para ver esta pagina
echo ($_SESSION['loggedin']);
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
        <title>Administrar Usuarios</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">                
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">   
        <script src="../js/angular.min.js" type="text/javascript"></script>

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
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="valorarConductores.php">Valora a nuestros conductores</a></li>
                </ul>
            </nav>
        </header>
        <br>
        <br>
        <div align="center" ng-controller="mainController">

        </div>

        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../vista/contacto.php">Contacto</a></p>
        </footer> 
    </body>
</html>