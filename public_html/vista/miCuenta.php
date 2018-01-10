<!DOCTYPE html>
<html lang ="en" ng-app="miAplicacion">
    <head>
        <title>Mi cuenta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- jQuery library -->
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../css/styloMiCuenta.css" rel="stylesheet" type="text/css"/>
        <script src="../js/scriptMiCuenta.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <div class="container auth">
                <br><br>

                <h1 class="text-center">Mi cuenta </h1>
                <div id="big-form" class="well auth-box">
                    <a target="_blank" >
                        <img id="imagen" class="imagenPerfil" src="../img/imagenpredet.png"  alt="imagen"  align="right">
                    </a>


                    <fieldset>
                        <h2 class="text-left">Mis datos</h2>
                        <br>
                        <form name="form" action="" method="post">

                            <!-- Nombre-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput" >Nombre</label>  
                                <div class="">
                                    <input id="nombre" name="textinput" placeholder="" class="form-control input-md" type="text" required>
                                </div>
                            </div>

                            <!-- Apellido-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Apellido</label>  
                                <div class="">
                                    <input id="apellido" name="textinput" placeholder="" class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Telefono-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Telefono</label>  
                                <div class="">
                                    <input id="telefono" type="tel" name="textinput" placeholder="" class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Email-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Email</label>  
                                <div class="">
                                    <input id="email"  name=email" type="email" placeholder="" class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Coche-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Coche</label>  
                                <div class="">
                                    <input id="coche" name="textinput" placeholder="" class="form-control input-md" type="text" ><button id="singlebutton" name="singlebutton" class="btn btn-default">Añadir</button>
                                </div>
                            </div>
                            <!-- Imagen-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Imagen perfil</label>  
                                <div class="">
                                    <input id="imagenlink" name="textinput"  class="form-control input-md" type="text" required>
                                </div>
                            </div>

                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-default">Guardar datos</button>
                        </form>
                        </div>
                <div id="big-form" class="well auth-box">
                        <!-- Trayectos pasajero -->
                        <div class="form-group">
                            <h2 class=" " for="selectmultiple">Trayectos pasajero</h2>
                            <div class="scroll">
                                <div id="tablaPasajero">

                                </div>
                            </div>

                        </div>
                        <!-- Trayectos conductor -->
                        <div class="form-group">
                            <h2 class="" for="selectmultiple">Trayectos conductor</h2>
                            <div class="scroll">
                                <div id="tablaConductor"> 
                                </div>
                            </div>
                            <!-- Trayectos peticiones -->
                            <div class="form-group">
                                <h2 class="" for="selectmultiple">Peticiones</h2>
                                <div class="scroll">
                                    <div id="tablaPeticiones">

                                    </div>

                                </div>

                                </fieldset>

                            </div>
                            <div class="clearfix"></div>
                        </div>

                </div>
                </body>
                </html>