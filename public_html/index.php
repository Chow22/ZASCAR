<?php
session_start();
//echo ($_SESSION['loggedin']);
//echo "<h1>" + ($_SESSION['idusu']) + "</h1>";
?>
<!doctype html>
<html lang="en" class="no-js">
    <head>
        <!--pa la seçao-->


        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>Home</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
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
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="vista/informacion.php">Información</a></li>                                                        
                    <li><a href="controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="vista/valorarConductores.php">Valora a nuestros conductores</a></li>
                </ul>
            </nav>    
        </header>        
        <section>             
            <fieldset>
                <p class="intro tamano">¿Te cuesta ver el tamaño de la letra? Pulsa aquí para aumentar el tamaño de la fuente.</p>
                <buttonton name="botonModificar" value="Modificar Tamaño" onclick="Tamanyo()" class="tamano"></button>
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-zoom-in"></span> Zoom
                    </button>	
            </fieldset>
            <br>
            <strong class="strindex">En ZASCAR podrás encontrar gente con la que viajar, ahorrando así el nivel de emisiones hacia el medio ambiente, y agilizando el tráfico en la carretera</strong>           
        </section>
        <section id="pageContent">
            <main role="main">
                <p>Si te registras en Zascar podrás apuntarte a viajes para llegar a tu destino, y si registras un coche propio puedes publicar viajes también, no olvides puntuar a tu conductor tras cada viaje!</p>
                <section class="section-white">
                    <div class="container-main">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="img/carousel0.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h2>Podrás conocer a gente muy interesante, y sin pagar ni un chavo!</h2>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/carousel1.png" alt="...">
                                    <div class="carousel-caption">
                                        <h2>Sin seguros que te aseguren</h2>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/carousel2.png" alt="...">
                                    <div class="carousel-caption">
                                        <h2>Viaja feliz con tus compañeros de viaje</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>

                    </div>
                </section>
            </main>
            <aside>
                <div id="wrapper">
                    <ul class="menu">
                        <li class="item1"><a href="#">Opciones de Cuenta</a>
                            <ul>
                                <li class="subitem1"><a href="vista/miCuenta.php">Modificar Cuenta</a></li>
                                <li class="subitem1"><a href="vista/miCuenta.php">Eliminar Cuenta</a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#">Zona Conductor</a>
                            <ul>
                                <li class="subitem1"><a href="vista/insertarTrayectos.php">Publicar Trayecto</a></li>
                                <li class="subitem2"><a href="vista/consultarTrayectos.php">Consultar Trayecto</a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#">Zona Pasajero</a>
                            <ul>
                                <li class="subitem1"><a href="vista/buscarTrayectos.php">Buscar Trayecto</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>

                <!--initiate accordion-->
                <script type="text/javascript">
                    $(function () {

                        var menu_ul = $('.menu > li > ul'),
                                menu_a = $('.menu > li > a');

                        menu_ul.hide();

                        menu_a.click(function (e) {
                            e.preventDefault();
                            if (!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true, true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true, true).slideUp('normal');
                            }
                        });

                    });
                </script>
            </aside>
        </section>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="vista/contacto.php">Contacto</a>
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
