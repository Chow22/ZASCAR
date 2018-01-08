<!DOCTYPE html>
<html>
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
                    <form action="google.es" method="post">
                        <fieldset>
                             <h2 class="text-left">Mis datos</h2>
                            <br>
       

                            <a target="_blank" href="paris.jpg">
                                <img src="../img/Selfi_monalisa.jpg"  alt="Paris" style="width:25%" align="right">
                            </a>
                          
                            <!-- Nombre-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Nombre</label>  
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
                                    <input id="textinput" name=email" type="email" placeholder="" class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Coche-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Coche</label>  
                                <div class="">
                                    <input id="textinput" name="textinput" placeholder="" class="form-control input-md" type="text" ><button id="singlebutton" name="singlebutton" class="btn btn-default">Añadir</button>
                                </div>
                            </div>
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-default">Modificar</button>
                            <!-- Trayectos pasajero -->
                            <div class="form-group">
                                <label class=" " for="selectmultiple">Trayectos pasajero</label>
                                <div class="scroll">
                                    <div id="tablaPasajero">
                                        
                                    </div>
                                </div>

                            </div>
                            <!-- Trayectos conductor -->
                            <div class="form-group">
                                <label class="" for="selectmultiple">Trayectos conductor</label>
                                <div class="scroll">
                                    <div id="tablaConductor">
                                        
                                    </div>
                            </div>
                            <!-- Trayectos peticiones -->
                            <div class="form-group">
                                <label class="" for="selectmultiple">Peticiones</label>
                                <div class="scroll">
                                      <div id="tablaPeticiones">
                                        
                                    </div>

                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </body>
</html>