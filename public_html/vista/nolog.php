<!DOCTYPE html>
<!-- Codigo para permitir acceso a usuarios logados solamente -->
<?php
session_start();
//echo ($_SESSION['loggedin']);
//echo "<h1 id='prueba'>" + ($_SESSION['loggedin']) + "</h1>";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<script>window.history.go(-3)</script>';
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


                <div id="big-form" class="well auth-box">

                    <fieldset>
                        <div class="center-block">

                            <img src="../img/nolog.png" alt=""/>
                            <br>
                            <h2 class="text-left">Esta pagina es solo para usuarios registrados, porfavor logeate.</h2>
                            <br>
                            <div class='container'>
                                <a href='../vista/login.php' class="btn btn-default">Login</a>
                            </div>
                            <br>
                            <div class='container'>
                                <a href='../vista/login.php' class="btn btn-default">Registrarme</a>
                            </div>
                        </div>
                </div>

            </div>
    </body>
</html>