<?php

require_once "../modelo/trayectos.php";
$origen = filter_input(INPUT_POST, 'origen');
$destino = filter_input(INPUT_POST, 'destino');
$paradas = filter_input(INPUT_POST, 'paradas');
$diahora = filter_input(INPUT_POST, 'diahora');
$cont = new modelo_trayecto();
$cont->insertar_trayecto($origen, $destino, $paradas, $diahora);
print($marca);
