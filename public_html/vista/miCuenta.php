<!DOCTYPE html>
<html>
    <head>
        <title>Mi cuenta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> 
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
                                <img src="http://bambinoides.com/wp-content/uploads/2014/10/Selfi_monalisa.jpg" alt="Paris" style="width:25%" align="right">
                            </a>
                          
                            <!-- Nombre-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Nombre</label>  
                                <div class="">
                                    <input id="nombre" name="textinput" placeholder="nombre.." class="form-control input-md" type="text" required>
                                </div>
                            </div>

                            <!-- Apellido-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Apellido</label>  
                                <div class="">
                                    <input id="apellido" name="textinput" placeholder="apellido.." class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Telefono-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Telefono</label>  
                                <div class="">
                                    <input id="telefono" type="tel" name="textinput" placeholder="telefono.." class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Email-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Email</label>  
                                <div class="">
                                    <input id="textinput" name=email" type="email" placeholder="email.." class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Coche-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Coche</label>  
                                <div class="">
                                    <input id="textinput" name="textinput" placeholder="coche.." class="form-control input-md" type="text" ><button id="singlebutton" name="singlebutton" class="btn btn-default">Añadir</button>
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
                                <label class="" for="selectmultiple">Trayectos peticiones</label>
                                <div class="scroll">
                                    <table>
                                        <tr>
                                            <td><strong>Curso</strong></td>
                                            <td><strong>Horas</strong></td>
                                            <td><strong>Horario</strong></td>
                                        </tr>

                                        <tr>
                                            <td>CSS</td>
                                            <td>20</td>
                                            <td>16:00 - 20:00</td>
                                        </tr>

                                        <tr>
                                            <td>HTML</td>
                                            <td>20</td>
                                            <td>16:00 - 20:00</td>
                                        </tr>

                                        <tr>
                                            <td>Dreamweaver</td>
                                            <td>60</td>
                                            <td>16:00 - 20:00</td>
                                        </tr>
                                    </table>
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