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
<!--pa la seçao-->
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>J3A - Registro</title>

        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link href="../assets/css/estiloRegistro.css" rel="stylesheet">
    </head>
    <body>

        <!--CONTENIDO-->
        <div class="container">


            <?php
            $host_db = "127.0.0.1:56624";
            $user_db = "j3a";
            $pass_db = "Qwerty123_";
            $db_name = "j3a";
            $tbl_name = "usuario";
// $host_db = "localhost";
// $user_db = "root";
// $pass_db = "";
// $db_name = "j3a";
// $tbl_name = "usuario";

            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }

            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM $tbl_name WHERE username = '$username'";

            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {

                $row = $result->fetch_array(MYSQLI_ASSOC);
                if (password_verify($password, $row['password'])) {

                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

                    echo "Bienvenido! " . $_SESSION['username'];
                    echo '<br><br><a href="../index.php">Portal</a> | <a href="../miperfil.php">Tu perfil</a>';
                } else {
                    echo "Username o Password estan incorrectos.";

                    echo "<br><a href='index.html'>Volver a Intentarlo</a>";
                }
}else {
                echo ($username . ' no está registrado. <a href="index.html">Registrate o vuelve a intentarlo con otro usuario</a>.');
            }
            mysqli_close($conexion);
            ?>
        </div>
        <!--/CONTENIDO -->

        <script src="../assets/js/registro.js"></script>

    </body>
</html>