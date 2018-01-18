<?php
session_start();
?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>Información</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <header>                         
            <div id="logo"><img src="img/logo.png">ZASCAR Enterprises

                <?php
                $now = time();
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $now < $_SESSION['expire']) {
                        echo "<a  href='controlador/logout.php'><img class='login-img' src='img/logoutbutton.png'/></a>";
                        echo "<p style='color:white;'>Bienvenido, ";
                        echo "<font color = 'orange'><a  href='vista/miCuenta.php' style='color:orange;'>";
                        echo ($_SESSION['username']);
                        echo"</font></a>";
                        echo "</p>";
                    } else {
                        session_destroy();
                        echo"<a  href='vista/login.php'><img class='login-img' src='img/loginbutton.png'/></a>";
                        echo "<p>Iniciar sesión</p>";
                    }
                    ?>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="#" class="active">Información</a></li>                                                        
                    <li><a href="controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="vista/valorarConductores.php">Valora a nuestros conductores</a></li>
                </ul>

            </nav>
        </header>
        <section>
            <strong class="strindex">ZASCAR ha sido formada para facilitar el acceso al centro a aquellos que no tienen coche o que quieren compartirlo</strong>
        </section>
        <section id="pageContent">
            <main role="main" class="main-info">
                <section class="section-white">
                    <div class="presentacion">                        
                        <div class="texto-info">
                            <p class="info"><strong class="strong-info">Nuestra empresa ha nacido como un reto presentado por el equipo docente del segundo curso del grado superior de Desarrollo de Aplicaciones Web.</strong></p><br>
                        <p class="contenido">La aplicacion consiste en una página web que permite crear trayectos concertados hacia y desde el centro para aquellos alumnos que no tienen un vehículo o que quieren viajar en grupo.</p><br>
                        <p class="contenido">Los usuarios que disponen de un vehículo publicarán su punto de partida y sus posibles paradas, para que los usuarios que quieren unirse al trayecto puedan consultar si les interesa el viaje en cuestión.</p><br>
                        <br>
                        <p class="contenido" align="center">Si quieres visitar la página del centro haz click <a href="http://www.fpzornotza.hezkuntza.net/web/guest/inicio1">aquí</a>.</p><br>
                        <p class="contenido" align="center">o</p><br>
                        <p class="contenido" align="center">Si quieres visitar el moodle del mismo haz click <a href="http://moodle.fpzornotza.com/">aquí</a>.</p><br>
                        </div>
                        <img class="img-info" src="img/image.jpg"/>
                    </div>
                </section>
            </main>             
        </section>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="contacto.php">Contacto</a></p>
        </footer>   


    </body>
</html>