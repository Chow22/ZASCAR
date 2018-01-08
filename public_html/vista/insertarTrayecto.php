<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo trayecto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/insertarTrayecto.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>INSERTAR TRAYECTO</h1>
        <br/>
        <div id="izquierda">
        <form action="controlador/trayectos_controlador.php">
            <fieldset id="campoviaje">
                <legend>Datos del viaje</legend>
                <label>¿Desde donde sales?</label><br/>
                <input type="text" id="inicio" placeholder="Inicio"/><br/>
                <label>¿A donde vas?</label><br/>
                <input type="text" id="destino" placeholder="Destino"/><br/>
                <label>Paradas</label><br/>
                <input type="text" id="paradas" placeholder="Paradas"/><br/>
            </fieldset>
            <br/><br/>
            <fieldset id="campofechadia">
                <legend>Dia y Hora</legend>
                <label>Fecha ida</label><br/>
                <input type="date" id="fecha"/><input type="time" id="datatime"/><br/>

            </fieldset>
            <br/>
            <input type="submit" value="ENVIAR"/>
        </form>
        </div>
        <div id="derecha">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1716.51054597435!2d-2.726258970762636!3d43.223020180119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e369c4e0d1637%3A0x78ccbf7525105ab1!2sCIFP+ZORNOTZA+LHII!5e1!3m2!1ses!2ses!4v1513758133494" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </body>
</html>
