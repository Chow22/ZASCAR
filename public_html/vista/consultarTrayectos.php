<!-- Codigo para permitir acceso a usuarios logueados solamente -->
<?php
session_start();
//echo ($_SESSION['loggedin']);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "<h1 id='idusuSession' hidden>";
    echo ($_SESSION['idusu']);

    echo "</h1>";
} else {
    header('Location: ../vista/nolog.php');

    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mi lista de trayectos</title>
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
        <script src="../js/consultarTrayectosUsuario.js" type="text/javascript"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>    
    </head>
    <body>
        <header>                         
            <div id="logo"><img src="../img/logo.png" alt=""/>ZASCAR Enterprises 
                <?php
                $now = time();
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $now < $_SESSION['expire']) {
                    echo "<a  href='../controlador/logout.php'><img class='login-img' src='../img/logoutbutton.png'/></a>";
                    echo "<p style='color:white;'>Bienvenido, ";
                    echo "<font color = 'orange'>";
                    echo ($_SESSION['username']);
                    echo"</font>";
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
                </ul>

            </nav>
        </header>
        <br/>
        <br/>


        <div align="center">
            <h1>Trayectos de <?php echo ($_SESSION['username']) ?></h1>        
            <br>
            <strong class="strindex">Aquí se muestra tu lista de trayectos que 
                has añadido. Podrás modificar o borrar haciendo click en el boton 
                <img src="../img/eliminar.png" width="15px" height="15px" alt=""/> en cada una de las filas de la tabla.</strong>
            
            <div id="tablaTrayectos">
            </div>
        </div>
        <br/>
        <br/>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../contacto.php">Contacto</a></p>
        </footer>
    </body>
</html>
