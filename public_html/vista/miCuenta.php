<!DOCTYPE html>
<!-- Codigo para permitir acceso a usuarios logados solamente -->
<?php
session_start();
//echo ($_SESSION['loggedin']);
//echo "<h1 id='prueba'>" + ($_SESSION['loggedin']) + "</h1>";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<h1 id='idusuSession' hidden>";
                echo  ($_SESSION['idusu']);
                echo "</h1>";
} else {
    header('Location: ../vista/nolog.php');
    exit();
}
?>
<html lang ="en" >
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
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
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
                        <a  href="../">
                            <img id="atras"  src="../img/atras.png"  alt="imagen"  align="left" style="float:top;width:10%; border:none" >
                        </a>
                        <br><br><br>
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
                            <!-- Imagen-->
                            <div class="form-group">
                                <label class=" control-label" for="textinput">Imagen perfil</label>  
                                <div class="">
                                    <input id="imagenlink" name="textinput"  class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <!-- Login-->
                            <div class="form-group login">
                                <label class=" control-label" for="textinput">Login</label> <br><br>
                                <div class="">
                                    <input id="user" name="textinput" placeholder="Usuario.." class="form-control input-md" type="text" required disabled="" >
                                    <input id="pass" name="textinput" placeholder="Contraseña.." class="form-control input-md" type="password" required >
                                </div>
                                <br>
                                <!-- Coche-->
                                <div class="form-group coche">
                                    <label class=" control-label" for="textinput">Coche</label> <br><br>
                                    <div class="">
                                        <input id="marca" name="textinput" placeholder="Marca.." class="form-control input-md" type="text" >
                                        <input id="plazas" name="textinput" placeholder="Plazas.." class="form-control input-md" type="text" >
                                        <input id="combustible" name="textinput" placeholder="Combustible.." class="form-control input-md" type="text" >
                                        <input id="matricula" name="textinput" placeholder="Matricula.." class="form-control input-md" type="text" >
                                    </div>
                                    <br>
                                </div>
                            </div>

                            <button type="button" id="modificar" name="singlebutton" class="btn btn-default">Guardar datos</button>
                            <button type="button" id="borrarCuenta" name="singlebutton" class="btn btn-default">Borrar cuenta</button>
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