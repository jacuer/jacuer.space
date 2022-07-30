<?php
require_once("../controllers/UsersController.php");

echo "<h1> CRUD USERS controller </h1>";

$users = new UsersController();
$new_users = array(
    'user' => '@jose',
    'email' => 'jose@gmail.com',
    'name' => 'jose alvaro',
    'pass' => 'jacuer',
    'role' => 'User',
    'institucion' => 'Las americas',
);
//$users->get();
var_dump($users->get());

/* $new_candidato = array(
    'candidato_id' => '01',
    'name' => 'jose alvaro',
    'aspirante' => 'Personero',
    'foto' => 'imagen'

);
//$users->get();
var_dump($users->set($new_candidato)); */
?>
