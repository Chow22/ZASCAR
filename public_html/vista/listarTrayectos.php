<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>     
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>¿Quieres conocer los viajes?</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/cargarDatosTrayectos.js" type="text/javascript"></script>
<!--        <script src="../js/script.js"></script>        -->
    </head>
    <body>
        <header>                         
            <div id="logo"><img src="../img/logo.png">ZASCAR Enterprises

                <?php
                $now = time();
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $now < $_SESSION['expire']) {
                    echo "<a  href='../controlador/logout.php'><img class='login-img' src='../img/logoutbutton.png'/></a>";
                    echo "<p style='color:white;'>Bienvenido, ";
                    echo "<font color = 'orange'><a  href='../vista/miCuenta.php' style='color:orange;'>"; //manda a micuenta clicando en el nombre de usuario
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
                    <li><a href="../vista/index.php">Home</a></li>
                    <li><a href="../vista/informacion.php">Información</a></li>                                                        
                    <li><a href="#" class="active">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="../vista/valorarConductores.php">Valora a nuestros conductores</a></li>
                </ul>
            </nav>
        </header>
        <br>
        <br>
        <h1 align="center">Lista de trayectos que pueden interesarte</h1>
        <br>
        <p><strong class="strindex">En esta página se muestra los trayectos publicados por nuestros conductores 
            con diferente origen, fecha y hora, plazas y paradas. elige el viaje que mas te convenga, agregate y espera 
            la respuesta del conductor.<p>
                Si te interesa alguno de estos viajes debes estar <strong><a href="../vista/login.php">LOGEADO</a></strong> y entrar Zona Pasajero > <strong><a href="../vista/buscarTrayectos.php"> Buscar trayecto </a></strong> del menú desplegable
            </strong> </p>
        <hr>             
        <div class="margeneslista">           
            <br>
            <div class="container">             
                <div class="listWrap">
                    <ul class="list tabla-listar" >
                        <li>
                            <span>Origen</span>
                            <span>Destino</span>
                            <span>Fecha/Hora</span>
                            <span>Plazas</span>
                            <span>Paradas</span>
                            <span></span>
                        </li>
                        <?php
                        foreach ($pd as $trayecto) {
                            ?>
                            <li>
                                <span class="tabla-campos"><?php echo $trayecto["origen"]; ?></span>
                                <span class="tabla-campos"><?php echo $trayecto["destino"]; ?></span>
                                <span><?php echo $trayecto["fecha_hora"]; ?></span>
                                <span><?php echo $trayecto["plazas"]; ?></span>
                                <span><?php echo $trayecto["paradas"]; ?></span>
                                <span><p></span>
                                <span><p></span>
                                <span><p></span>                            
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>                            
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../vista/contacto.php">Contacto</a></p>
        </footer>   
    </body>
</html>
