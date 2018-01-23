<?php
session_start();
?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>Contacto</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <header>                         
           <div id="logo"><img src="../img/logo.png">ZASCAR Enterprises

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
                        echo"<a  href='login.php'><img class='login-img' src='../img/loginbutton.png'/></a>";
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
        <section>
            <strong class="strindex">Puedes contactar con nosotros de las siguientes formas</strong>
        </section>
        <section id="pageContent">
                <section class="section-white">
                    <div class="contacto">
                        <img src="../img/office.jpg"/>
                        <div class="texto">
                        <p class="info">Somos una empresa abierta a sugerencias y dispuesta a resolver las dudas y posibles problemas de los usuarios, tenemos gente a disponibilidad de los usuarios si estos lo requieren.</p>
                        <p>Si quieres contactar con nosotros por teléfono |</p>
                        <p class="contenido"> 946 73 02 51</p><br>
                        <p>Si quieres hablar con nosotros en persona |</p>
                        <p class="contenido"> Barrio Urritxe, 0 S/N, 48340 Amorebieta-Etxano, BILBAO</p><br>
                        <p>Si prefieres llegar a nosotros vía E-mail |</p>
                        <p class="contenido">E-mail a  <a href="mailto:ethazi3@gmail.com">Zascar Enterprises</a></p>
                        </div>
                    </div>
                </section>
    </section>      
        <footer>
            <p>&copy; El centro tendrá sus puertas abiertas en todo día lectivo en el siguiente horario |  8:30–21:00</p>
        </footer>   


    </body>
</html>
