<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Zascar</title>          
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >
        <div align="center">           
            <hr>
            <div class="container">
                <div class="row">                                           
                    <div class="col-md-4 col-md-offset-4 login">                              
                        <h1 class="text-center"><i class="glyphicon glyphicon-user"></i>Login</h1>                                                                   
                        <form method="POST" action="../controlador/login_controlador.php">
                            <fieldset>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario: </label>
                                    <input type="text" class="form-control" name="user">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña: </label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn">Register</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                        </form>
                        </fieldset>                        
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
