<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>Información</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../js/script.js"></script>
         <script src="../js/regist.js" type="text/javascript"></script>
        <script src="../js/registro.js" type="text/javascript"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>                         
            <div id="logo"><img src="../img/logo.png">ZASCAR Enterprises
                <a  href="#"><img class="login-img" src="../img/loginbutton.png" alt=""/></a>
                <p>Iniciar sesión</p>
            </div>
            <br>
            <br>
            <nav>  
                <ul>
                    <li><a href="../index.php" class="active">Home</a></li>
                    <li><a href="../informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                </ul>

            </nav>
        </header>
        <div align="center">           
            <hr>
            <div class="container">
                <div class="row">                                           
                    <div class="col-md-4 col-md-offset-4 login">                              
                        <h1 class="text-center"><i class="glyphicon glyphicon-user"></i>Login</h1>                                                                   
                        <form method="POST" action="../controlador/login_controlador.php">
                            <fieldset>
                                <div class="form-group">
                                    <label>Usuario: </label>
                                    <input type="text" class="form-control" name="usuario">
                                </div>
                                <p>
                                <div class="form-group">
                                    <label>Contraseña: </label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                <p>
                                    <!--                                <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox"> Check me out
                                                                        </label>
                                                                    </div>-->
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                        ¿No tienes cuenta? <a href="#" id="mostrarRegistro" class="btn">Registrate aquí</a>
                                    </div>                                    
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                        </form>
                        </fieldset> 
                            <br>
                        <div class="popup">
                        <div id="zonaReg">
                            <form action="../controlador/registro_controlador.php" method="post" name="registro" onsubmit="return Envio()">
                                <fieldset id="campoviaje">
                                    <legend>Datos Personales: </legend>
                                    <br>
                                    <label>Nombre</label><br/>
                                    <input type="text" name="nombre" /><br/>
                                    <label>Apellidos</label><br/>
                                    <input type="text" name="apellidos"/><br/>
                                    <label>Teléfono</label><br/>
                                    <input type="tel" name="telefono" onkeypress="return TeclaPulsada(event)"/><br/>
                                    <label>Email</label><br/>
                                    <input type="text" name="email" placeholder="juangarcia@ejemplo.com" onkeypress="return comprobarArroba(event)"/><br/>
                                    <label>Imagen</label><br/>
                                    <input type="text" name="imagen"/><br/>
                                    <label>Nombre de usuario</label><br/>
                                    <input type="text" name="usuario"/><br/>
                                    <label>Contraseña</label><br/>
                                    <input type="password" name="pass" id="clave1"/><br/>
                                    <label>Repite contraseña</label><br/>
                                    <input type="password" id="clave2"/><br/>
                                </fieldset>
                                <br/><br/>
                                <br/>
                                <input type="submit" value="REGISTRARME"/> <input type="reset" value="BORRAR"/>
                            </form>
                        </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>