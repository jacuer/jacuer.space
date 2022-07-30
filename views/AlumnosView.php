<?php
require_once("../models/AlumnosModel.php");

echo "<h1> CRUD Alumnos MODEL </h1>";

$alumnos = new AlumnosModel();
$new_users = array(
    'user' => '@jose',
    'email' => 'jose@gmail.com',
    'name' => 'jose alvaro',
    'pass' => 'jacuer',
    'role' => 'User',
    'institucion' => 'Las americas',
);
//$users->get();
var_dump($alumnos->get());

/* $new_candidato = array(
    'candidato_id' => '01',
    'name' => 'jose alvaro',
    'aspirante' => 'Personero',
    'foto' => 'imagen'

);
//$users->get();
var_dump($users->set($new_candidato)); */
?>
