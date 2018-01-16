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
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "<a  href='controlador/logout.php'><img class='login-img' src='img/logoutbutton.png'/></a>";
                    echo "<p style='color:white;'>Bienvenido, ";
                    echo "<font color = 'orange'>";                 
                    echo ($_SESSION['username']);
                    echo"</font>";
                    echo "</p>";
                } else {
                    echo"<a  href='vista/login.php'><img class='login-img' src='img/loginbutton.png'/></a>";
                    echo "<p>Iniciar sesión</p>";
                }
                ?>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#" class="active">Información</a></li>                                                        
                    <li><a href="controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                </ul>

            </nav>
        </header>
        <section>
            <strong class="strindex">ZASCAR ha sido formada para facilitar el acceso al centro a aquellos que no tienen coche o que quieren compartirlo</strong>
        </section>
        <section id="pageContent">
            <main role="main">
                <section class="section-white">
                    <div class="presentacion"></div>
                </section>
            </main>             
        </section>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="contacto.php">Contacto</a></p>
        </footer>   


    </body>
</html>