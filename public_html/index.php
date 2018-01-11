<?php
session_start();
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "zascar";
        $tbl_name = "usuarios";

        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($conexion->connect_error) {
            die("La conexion falló: " . $conexion->connect_error);
        }

$usuario = filter_input(INPUT_POST, 'usuario');
$pass = filter_input(INPUT_POST, 'pass');

        $sql = "SELECT * FROM $tbl_name WHERE usuario = '$usuario'";

        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {

            $row = $result->fetch_array(MYSQLI_ASSOC);
            if (password_verify($pass, $row['pass'])) {

                $_SESSION['loggedin'] = true;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

                echo "Bienvenido! " . $_SESSION['usuario'];
                echo '<br><br><a href="../index.php">Home</a> | <a href="../index.php"></a>';
            } else {
                echo "Usuario o Contraseña estan incorrectos.";

                echo "<br><a href='index.php'>Volver a Intentarlo</a>";
            }
        } else {
            echo ($usuario . ' no está registrado. <a align="center" href="vista/login.php">Registrate o vuelve a intentarlo con otro usuario</a>.');
        }
        mysqli_close($conexion);
        ?>
        <header>                         
            <div id="logo"><img src="img/logo.png">ZASCAR Enterprises
                <a  href="vista/login.php"><img class="login-img" src="img/loginbutton.png" alt=""/></a>
                <p>Iniciar sesión</p>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="informacion.php">Información</a></li>                                                        
                    <li><a href="#">¿Quiéres conocer los viajes?</a></li>
                </ul>

            </nav>
        </header>
        <section>
            <strong>En ZASCAR podrás encontrar gente con la que viajar, ahorrando así el nivel de emisiones hacia el medio ambiente, y agilizando el tráfico en la carretera</strong>
        </section>
        <section id="pageContent">
            <main role="main">
                <section class="section-white">
                    <div class="container">

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
                                    <img src="img/carousel0.png" alt="...">
                                    <div class="carousel-caption">
                                        <h2>Heading</h2>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/carousel1.png" alt="...">
                                    <div class="carousel-caption">
                                        <h2>Heading</h2>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="img/carousel2.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <h2>Heading</h2>
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
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="contacto.php">Contacto</a></p>
        </footer>   


    </body>
</html>