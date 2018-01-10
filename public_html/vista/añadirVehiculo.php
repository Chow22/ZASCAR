<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo Vehículo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>AÑADIR VEHICULO</h1>
        <form action="../controlador/vehiculo_controlador.php" method="post" name="vehiculo">
            <fieldset>
                <legend></legend>
                <label>Marca</label><input type="text" name="marca"/><br/>
                <label>Plazas</label><input type="text" name="plazas"/><br/>
                <label>Combustible</label><input type="text" name="combustible"/><br/>
                <label>Matrícula</label><input type="text" name="matricula"/><br/>
                <input type="submit" value="GUARDAR"/> <input type="reset" value="BORRAR"/>
            </fieldset>
        </form>
    </body>
</html>
