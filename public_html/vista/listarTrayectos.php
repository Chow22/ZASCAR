<!DOCTYPE html>
<html lang="en">     
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>Buscar Trayectos</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">       
        <script src="../js/script.js"></script>        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">         
        <!--       echoooo fuerita de acaaaa       -->
    </head>
    <body>  
        <header>                         
            <div id="logo"><img src="../img/logo.png">ZASCAR Enterprises
                <a  href="../vista/login.php"><img class="login-img" src="../img/loginbutton.png" alt=""/></a>
                <p>Iniciar sesión</p>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../informacion.php">Información</a></li>                                                        
                    <li><a href="buscarTrayecto.html" class="active">¿Quiéres conocer los viajes?</a></li>
                </ul>

            </nav>
        </header>
        <br>
        <br>

        <h1>Lista de trayectos que pueden interesarte</h1>
        <br> 
        <p>En esta página se muestra los trayectos publicados por nuestros conductores, se ofrecen diferentes trayectos con diferente origen,fecha y hora,plazas y paradas
            elige el viaje que mas te convenga, agregate y espera la respuesta del conductor</p>
        <br>
        <div align="center">
            <section>
                <table align="center" border="6">
                    <tr>                
                        <td><strong>Origen</strong></td>
                        <td ><strong>Destino</strong></td>
                        <td><strong>Fecha/Hora</strong></td>
                        <td><strong>Plazas</strong></td>                                   
                        <td><strong>Paradas</strong></td>   
                    </tr>
                    <?php
                    foreach ($pd as $trayecto) {
                        ?>
                        <tr>                   
                            <td><?php echo $trayecto["origen"]; ?></td>
                            <td><?php echo $trayecto["destino"]; ?></td>
                            <td><?php echo $trayecto["fecha_hora"]; ?></td> 
                            <td><?php echo $trayecto["plazas"]; ?></td>
                            <td><?php echo $trayecto["paradas"]; ?></td>                   
                        </tr>
                        <?php
                    }
                    ?>
                    </td>
                    </tr>
                </table>                 
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
                                    <li class="subitem1"><a href="#">Publicar Trayecto</a></li>
                                    <li class="subitem2"><a href="#">Eliminar Trayecto</a></li>
                                </ul>
                            </li>
                            <li class="item3"><a href="#">Zona Pasajero</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Buscar Trayecto</a></li>
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
            <br>                
        </div>
        <br>     
    </body>
</html>