<?php 

if( isset($_SESSION['role']) == 'Admin' ){ 

print('<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
	<div class="row"><p class="text-dark fs-5">GESTIÓN DE CANDIDATOS</p></div>');

$candidato = new CandidatosController();
$ca = $candidato->get();
$direcorio ="public/img/candidatos/";
asort($ca);

if( empty($ca) ) {
	print( '
				<div class="mb-2 text-danger fs-5">Wouuu..¡No existen candidatos!</div>
			 	<div class="col">
			 		<form method="POST">
						<input type="hidden" name="r" value="candidatos-add">
						<input class="btn btn-success" type="submit" value="Agregar">
					</form>
				</div>
			
	');
} else {
	$template_ca = '
	<div class="table-responsive">
		<table  class="table table-striped table-hover table-sm">
			<tr>
				<th>Item</th>
				<th>Nombre</th>
				<th>Aspirante</th>
				<th>Foto</th>
				<th>Número tarjetón</th>
				
				<th colspan="3">
					<form method="POST">
						<input type="hidden" name="r" value="candidatos-add">
						<input class="btn btn-success" type="submit" value="Agregar">
					</form>
				</th>
			</tr>';
	$i=1;
	foreach ($ca as $value) {
		# code...
	
		$template_ca .= '
			<tr>
				<td>'. $i .'</td>
				<td>'. $value['name'] .'</td>
				<td>'. $value['aspirante'] .'</td>
				<td><img src='.$direcorio.$value['foto'].' style="max-width:12%; height: auto;"></td>
				<td>'. $value['candidato_id'] .'</td>
				
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="candidatos-show">
						<input type="hidden" name="candidato_id" value="'. $value['candidato_id'] . '">
						<input class="btn btn-primary" type="submit" value="Mostrar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="candidatos-edit">
						<input type="hidden" name="candidato_id" value="'. $value['candidato_id'] . '">
						<input class="btn btn-warning" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="candidatos-delete">
						<input type="hidden" name="candidato_id" value="'. $value['candidato_id'] . '">
						<input class="btn btn-danger" type="submit" value="Eliminar" >
					</form>
				</td>
			</tr>
		'; 
	$i++;
	}

	$template_ca .= '
		</table>
	</div>
	';

	print($template_ca);
}
}
else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>