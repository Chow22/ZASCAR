<section>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <hgroup>

                    <h1 class="free">Recuperar contraseña</h1>
                </hgroup>
                <div class="well">
                    <form method="POST" action="../controlador/recuerdo_clave_controlador.php">
                        <div class="input-group">
                            <input class="btn btn-lg" name="email" id="email" type="email" placeholder="Tu email" required>&nbsp;<button class="btn btn-info btn-lg" type="submit">Enviar</button>&nbsp;<a href="login.php" class="btn btn-info btn-lg">Volver</a><br>
                           
                             
                        </div>
                    </form>
                </div>
                <small class="promise"><em>We won't send spam.</em></small>
            </div>
        </div>       
    </div>
</section>