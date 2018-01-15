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
        <title>Nuevo Vehículo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
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
        <h1>AÑADIR VEHICULO</h1>
        <form action="../controlador/vehiculo_controlador.php" method="post" id="vehiculo">
            <fieldset>
                <legend>Nuevo vehículo</legend>
                <label>Id usuario</label><br/>
                <input type="text" name="id"/><br/>
                <label>Marca</label><br/>
                <input type="text" name="marca"/><br/>
                <label>Plazas</label><br/>
                <input type="text" name="plazas"/><br/>
                <label>Combustible</label><br/>
                <input type="text" name="combustible"/><br/>
                <label>Matrícula</label><br/>
                <input type="text" name="matricula"/><br/>
            </fieldset>
            <br/>
            <input type="submit" value="GUARDAR"/> <input type="reset" value="BORRAR"/>

        </form>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../contacto.php">Contacto</a></p>
        </footer>
    </body>
</html>
