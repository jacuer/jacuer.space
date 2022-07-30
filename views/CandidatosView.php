<?php
require_once("../controllers/CandidatosController.php");

echo "<h1> Crud Candidatos Controller </h1>";

//$candidato = new CandidatosController();

$new_candidato = array(
    'candidato_id' => 05,
    'name' => 'Juan David cuero',
    'aspirante' => 'Personero',
    'foto' => 'imagen-jpg'

);
$candidato->del(5);
//var_dump($candidato->set($new_candidato));
var_dump($candidato->get());
?>
