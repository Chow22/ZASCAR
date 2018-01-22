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
                    echo "<font color = 'orange'><a  href='../vista/miCuenta.php' style='color:orange;'>";
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
        <section>
            <h1 align="center">Lista de trayectos que pueden interesarte</h1>
            <hr>
            <br> 
            <strong class="strindex">En esta página se muestra los trayectos publicados por nuestros conductores, se ofrecen diferentes trayectos 
                con diferente origen,fecha y hora,plazas y paradas elige el viaje que mas te convenga, agregate y espera 
                la respuesta del conductor.<br>
                Si te interesa alguno de estos viajes debes estar <strong><a href="../vista/login.php">LOGEADO</a></strong> y entrar Zona Pasajero > Buscar trayecto del menú desplegable</strong>        </section>
        <section id="pageContent">
            <main role="main">
                <section class="section-white">
                   
                    <div class="container-main">
                    <div class="listWrap">
                         <div class="margenes">
                        <ul class="list" >

                            <li>
                                <span>Origen</span>
                                <span>Destino</span>
                                <span>Fecha/Hora</span>
                                <span>Plazas</span>
                                <span>Paradas</span>

                            </li>
                            <?php
                            foreach ($pd as $trayecto) {
                                ?>
                                <li>

                                    <span><?php echo $trayecto["origen"]; ?></span>
                                    <span><?php echo $trayecto["destino"]; ?></span>
                                    <span><?php echo $trayecto["fecha_hora"]; ?></span>
                                    <span><?php echo $trayecto["plazas"]; ?></span>
                                    <span><?php echo $trayecto["paradas"]; ?></span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>

                    </div>
                    </div>
                    </div>
                </section>
            </main>
            <aside>
                <div id="wrapper">
                    <ul class="menu">
                        <li class="item1"><a href="#">Opciones de Cuenta</a>
                            <ul>
                                <li class="subitem1"><a href="miCuenta.php">Modificar Cuenta</a></li>
                                <li class="subitem1"><a href="miCuenta.php">Eliminar Cuenta</a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#">Zona Conductor</a>
                            <ul>
                                <li class="subitem1"><a href="insertarTrayectos.php">Publicar Trayecto</a></li>
                                <li class="subitem2"><a href="consultarTrayectos.php">Consultar Trayecto</a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#">Zona Pasajero</a>
                            <ul>
                                <li class="subitem1"><a href="buscarTrayectos.php">Buscar Trayecto</a></li>
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
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../vista/contacto.php">Contacto</a></p>
        </footer>   
    </body>
</html>
