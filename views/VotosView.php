<?php
//require_once("../models/VotosModel.php");

echo "<h1> CRUD votos MODEL </h1>";

//$votos = new VotosController();
$new_voto = array(
    'votacion_id' => 1,
    'voto_candidato' => 0
    
);
$votos->set($new_voto);
$v = $votos->get(100);

foreach ($v as $value) {
    $s = $value['voto_candidato'];
}
$s+=1;
var_dump($s);

?>