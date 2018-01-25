<!-- Codigo para permitir acceso a usuarios logueados solamente -->
<?php
session_start();
//echo ($_SESSION['loggedin']);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    header('Location: ../vista/nolog.php');

    exit();
}
?>
<!DOCTYPE html>
<html>
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
        <script src="../js/regist.js" type="text/javascript"></script>
        <script src="../js/registro.js" type="text/javascript"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>                         
            <div id="logo"><img src="../img/logo.png">ZASCAR Enterprises 
                <?php
                $now = time();
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $now < $_SESSION['expire']) {
                    echo "<a  href='controlador/logout.php'><img class='login-img' src='../img/logoutbutton.png'/></a>";
                    echo "<p style='color:white;'>Bienvenido, ";
                    echo "<font color = 'orange'><a  href='vista/miCuenta.php' style='color:orange;'>";
                    echo ($_SESSION['username']);
                    echo"</font></a>";
                    echo "</p>";
                } else {
                    session_destroy();
                    echo"<a  href='vista/login.php'><img class='login-img' src='../img/loginbutton.png'/></a>";
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
                    <li><a href="valorarConductores.php">Valora a nuestros conductores</a></li>
                </ul>

            </nav>
        </header>
        <br/>
        <div id="trayecto-form">
            <form action="../controlador/trayectos_controlador.php"  method="post" id="trayecto">
                <fieldset id="campoviaje">
                    <legend>Datos del viaje</legend>
                    <hr>
                    <label class="trayecto-label">¿Desde donde sales?</label><br/>
                    <input type="text" id="autocompleteOrigen" name="origen" placeholder="Inicio"/><br/>
                    <label class="trayecto-label">¿A donde vas?</label><br/>
                    <input type="text" id="autocompleteDestino" name="destino" placeholder="Destino"/><br/>
                    <label class="trayecto-label">Fecha y hora</label><br/>
                    <input type="datetime-local" name="fechahora"/><br/>
                    <label class="trayecto-label">Plazas</label><br/>
                    <input type="text" name="plazas" placeholder="Plazas"/><br/>
                    <label class="trayecto-label">Paradas</label><br/>
                    <textarea rows="4" cols="50" name="paradas" placeholder="Introduce tus paradas..." form="trayecto"></textarea><br/>
                    <?php echo '<input type="hidden" name="id" value="' . ($_SESSION['idusu']) . '"/>' . "\n"; ?>
                </fieldset>
                <br/>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>        
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9G3h2-Il9-fwshFj5RiNIFMby_jLi4_4&libraries=places">
        </script>
        <script src="../js/main.js?version=1.2"></script>
        <script src="../js/localizacion.js"></script>

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
