<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>Zascar - Entra o regístrate</title>
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
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../vista/informacion.php">Información</a></li>                                                        
                    <li><a href="../controlador/controlador_listar_trayectos.php">¿Quiéres conocer los viajes?</a></li>
                    <li><a href="../vista/valorarConductores.php">Valora a nuestros conductores</a></li> 
                </ul>

            </nav>
        </header>
        <div align="center">           
            <hr>
            <div class="container">
                <div class="row">                                           
                    <div class="col-md-4 col-md-offset-4 login">              
                        <br>
                        <div class="margeneslogin">
                            <h1 class="text-center"><i class="glyphicon glyphicon-user"></i>Iniciar Sesion</h1>    
                            <br>

                            <form method="POST" action="../controlador/login_controlador.php">

                                <div class="form-group" style="color:white;">                                                                        
                                    <label>Usuario:</label><input type="text" class="form-control" name="usuario">
                                </div>
                                <p>
                                <div class="form-group" style="color:white;">                                                                      
                                    <label>Contraseña:</label><input type="password" class="form-control" name="pass">
                                </div>
                                <a class="letra-recu" href="recu.php">¿Has olvidado la contraseña?</a><br><br>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                        <div class="unpoquitodemargen">
                                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button><br><br>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Registro</a><br>                                            
                                        </div>
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
                <hr>
                <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Registro</h4>
                            </div>
                            <form action="../controlador/registro_controlador.php" method="post" name="registro" onsubmit="return Envio()">
                                <div class="modal-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="nombre" class="form-control" required >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono:</label>
                                            <input type="text" name="telefono" class="form-control" onkeypress="return SoloNumeros(event)" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" name="apellidos" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre usuario:</label>
                                            <input type="text" name="usuario" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Imagen:</label>
                                            <input type="text" name="imagen" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contraseña:</label>
                                            <input type="password" id="clave1" name="pass" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="email" class="form-control" onkeypress="return ComprobarArroba(event)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Repite contraseña:</label>
                                            <input type="password" id="clave2" name="password" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
