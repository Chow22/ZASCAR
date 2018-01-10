<!DOCTYPE html>
<html>
    <head>
        <title>Registro de usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/insertarTrayecto.css" rel="stylesheet" type="text/css"/>
        <script src="../js/registro.js" type="text/javascript"></script>
    </head>
    <body>
        <h1>NUEVO USUARIO</h1>
        <br/>
        <div id="izquierda">
            <form action="../controlador/registro_controlador.php" method="post" name="registro" onsubmit="return Envio()">
                <fieldset id="campoviaje">
                    <legend>Datos Personales</legend>
                    <label>Nombre</label><br/>
                    <input type="text" name="nombre" placeholder="Ejemplo: Juan"/><br/>
                    <label>Apellidos</label><br/>
                    <input type="text" name="apellidos" placeholder="Ejemplo: Garcia"/><br/>
                    <label>Teléfono</label><br/>
                    <input type="tel" name="telefono" placeholder="Tu número de teléfono" onkeypress="return TeclaPulsada(event)"/><br/>
                    <label>Email</label><br/>
                    <input type="text" name="email" placeholder="juangarcia@ejemplo.com" onkeypress="return comprobarArroba(event)"/><br/>
                    <label>Imagen</label><br/>
                    <input type="file" name="imagen"/><br/>
                    <label>Nombre de usuario</label><br/>
                    <input type="text" name="usuario" placeholder="Escribe nombre para iniciar sesión"/><br/>
                    <label>Contraseña</label><br/>
                    <input type="password" name="pass" id="clave1" placeholder="Contraseña"/><br/>
                    <label>Repite contraseña</label><br/>
                    <input type="password" id="clave2" placeholder="Repite contraseña"/><br/>
                </fieldset>
                <br/><br/>
                <br/>
                <input type="submit" value="REGISTRARME"/> <input type="reset" value="BORRAR"/>
            </form>
        </div>
    </body>
</html>
