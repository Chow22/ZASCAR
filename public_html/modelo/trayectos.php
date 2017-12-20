<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Agenda</title>
    </head>
    <body >
        <div align="center">
            <h1>Iniciar Sesión</h1>
            <hr>
            <div id="Sign-In" > 
                <fieldset style="width:30px"><legend><b>LogIn:</b></legend> 
                    <form method="POST" action="../controlador/login_controlador.php"> 
                        Usuario: <br><input type="text" name="Nombre" size="40" required><br> 
                        Contraseña: <br><input type="password" name="Pass" size="40" required>
                        <br>
                        <br> 
                        <input id="button" type="submit" name="submit" value="Logeate"> 
                        <input id="button" type="submit" value="Cancel" onclick="location.href = '../vista/index.html'">
                        <br>
                    </form> 
                </fieldset> 
            </div >
        </div>
    </body>
</html>