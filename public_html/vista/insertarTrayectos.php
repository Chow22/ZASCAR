<!-- Codigo para permitir acceso a usuarios logueados solamente -->
<?php
session_start();
//echo ($_SESSION['loggedin']);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='../vista/login.php'>Login</a>";
    echo "<br><br><a href='../vista/registro.php'>Registrarme</a>";

    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo trayecto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../css/insertarTrayecto.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>                         
            <div id="logo"><img src="../img/logo.png">ZASCAR Enterprises
                <a  href="vista/login.php"><img class="login-img" src="img/loginbutton.png" alt=""/></a>
                <p>Iniciar sesión</p>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../informacion.php">Información</a></li>                                                        
                    <li><a href="#">¿Quiéres conocer los viajes?</a></li>
                </ul>

            </nav>
        </header>
        <br/>
        <div id="izquierda">
            <form action="../controlador/trayectos_controlador.php" method="post" id="trayecto">
                <fieldset id="campoviaje">
                    <legend>Datos del viaje</legend>
                    <label>¿Desde donde sales?</label><br/>
                    <input type="text" name="origen" placeholder="Inicio"/><br/>
                    <label>¿A donde vas?</label><br/>
                    <input type="text" name="destino" placeholder="Destino"/><br/>
                    <label>Fecha y hora</label><br/>
                    <input type="datetime-local" name="fechahora"/><br/>
                    <label>Plazas</label><br/>
                    <input type="text" name="plazas" placeholder="Plazas"/><br/>
                    <label>Paradas</label><br/>
                    <textarea rows="4" cols="50" name="paradas" placeholder="Introduce tus paradas..." form="trayecto"></textarea><br/>
                    <label>Id usuario</label><br/>
                    <input type="text" name="id" placeholder="Id"/><br/>
                </fieldset>
                <br/>
                <input type="submit" value="ENVIAR"/> <input type="reset" value="BORRAR"/>
            </form>
        </div>
        <div id="derecha">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1716.51054597435!2d-2.726258970762636!3d43.223020180119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e369c4e0d1637%3A0x78ccbf7525105ab1!2sCIFP+ZORNOTZA+LHII!5e1!3m2!1ses!2ses!4v1513758133494" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../contacto.php">Contacto</a></p>
        </footer>
    </body>
</html>
