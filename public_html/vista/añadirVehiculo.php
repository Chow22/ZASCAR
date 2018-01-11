<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo Vehículo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="../controlador/vehiculo_controlador.php" method="post" name="vehiculo">
            <fieldset>
                <legend></legend>
                <label>Marca</label><input type="text" name="marca"/><br/>
                <label>Plazas</label><input type="text" name="plazas"/><br/>
                <label>Combustible</label><input type="text" name="combustible"/><br/>
                <label>Matrícula</label><input type="text" name="matricula"/><br/>
                <input type="submit" value="GUARDAR"/> <input type="reset" value="BORRAR"/>
            </fieldset>
        </form>
        <footer>
            <p>&copy; Puedes contactar con nosotros en el siguiente enlace | <a href="../contacto.php">Contacto</a></p>
        </footer>
    </body>
</html>
