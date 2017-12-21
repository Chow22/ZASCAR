<?php

require_once '../modelo/modelo_Pelicula.php';
//$id = htmlspecialchars(trim($_POST['Id']));
$titulo = htmlspecialchars(trim($_POST['Titulo']));
$edad = htmlspecialchars(trim($_POST['Edad']));
$director = htmlspecialchars(trim($_POST['Director']));
$cartel = htmlspecialchars(trim($_POST['Cartel']));
$cont = new modelo_pelicula();
$cont->insertar_pelicula($titulo, $edad, $director, $cartel);
print($titulo);
