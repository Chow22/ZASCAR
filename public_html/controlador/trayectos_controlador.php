<?php

require_once "../modelo/trayectos.php";
$origen = filter_input(INPUT_POST, 'origen');
$destino = filter_input(INPUT_POST, 'destino');
$fechahora = filter_input(INPUT_POST, 'fechahora');
$plazas = filter_input(INPUT_POST, 'plazas');
$paradas = filter_input(INPUT_POST, 'paradas');
$id = filter_input(INPUT_POST, 'id');
$cont = new trayectos();
$cont->insertar_trayecto($origen, $destino, $fechahora, $plazas, $paradas, $id);
print $fechahora;
