<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<script>window.location.href = "../index.php";</script>';
}
?>
<html>
    <head>
        <title>No se puede mostrar la página web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/styloMiCuenta.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../img/favicon.ico"/> <!--Para el logo de las pestañas en los navegadores-->
    </head>
    <body>

        <div class="container auth">
            <br/><br/>


            <div id="big-form" class="well auth-box">


                <div class="center-block">

                    <img src="../img/nolog.png" alt="" />
                    <br/>
                    <h2 class="text-left">Esta página es solo para usuarios registrados, por favor logueate o registrate</h2>
                    <br/>
                    <div class='container'>
                        <a href='../vista/login.php' class="btn btn-default">Login</a>
                    </div>
                    <br/>
                    <div class='container'>
                        <a href='../vista/login.php' class="btn btn-default">Registrarme</a>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>