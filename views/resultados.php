<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php 
if( isset($_SESSION['role']) == 'Admin' ){ 

print('<div class="container-sm">
<p class="text-dark fs-5">RESULTADOS ELECCIONES <span class="text-success fw-bold">'.$_SESSION['institucion'].'</span></p>
<p><form method="POST">
<i class="bi bi-file-earmark-pdf"><input type="submit" name="r" value="reporte" class="btn btn-primary"></i></form>
</p>');

$voto = new VotosController();
$v = new VotosController();
 
$voto_total = $voto->getResultados();
sort($voto_total);

$direcorio ="public/img/candidatos/";

$status = $v->getResultados(1);

if( empty($status) ) {
	$template_ca = '
		<div class="container-sm">
			<div  class="row text-danger fs-5">Wouuu ¡No hay votos registrados!</div>
		</div>
	';
} else {
	$template_ca = '
	<div class="table-resposive">
		<table  class="table table-striped table-hover table-sm">
			<tr>
				<th>Tarjetón</th>
				<th>Candidato</th>
				<th>Aspirante</th>
				<th>Foto</th>
				<th>Votos</th>
			</tr>';

	foreach ($voto_total as $value) {
		# code...
	
		$template_ca .= '
			<tr>
				<td>'. $value['votacion_id'] .'</td>
				<td>'. $value['name'] .'</td>				
				<td>'. $value['aspirante'] .'</td>				
				<td><img src='.$direcorio.$value['foto'].' style="max-width:5%; height: auto;"></td>		
				<td>'. $value['voto_candidato'] .'</td>			
				
			</tr>
		'; 
	}

	$template_ca .= '
		</table>
	</div>
	';

}
print($template_ca);
}
else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>