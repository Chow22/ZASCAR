<?php

require_once '../modelo/modelo_vehiculo.php';
$id = htmlspecialchars(trim($_POST['id']));
$marca = htmlspecialchars(trim($_POST['marca']));
$plazas = htmlspecialchars(trim($_POST['plazas']));
$combustible = htmlspecialchars(trim($_POST['combustible']));
$matricula = htmlspecialchars(trim($_POST['matricula']));
$cont = new modelo_vehiculo();
$cont->insertar_vehiculo($id,$marca, $plazas, $combustible, $matricula);
print($marca);
