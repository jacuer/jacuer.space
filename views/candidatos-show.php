<?php 
if( $_POST['r'] == 'candidatos-show' && isset($_POST['candidato_id']) ) {


	$direcorio ="public/img/candidatos/";
	$ca_controller = new CandidatosController();
	$ca = $ca_controller->get($_POST['candidato_id']);

	if( empty($ca) ) {
		printf('
			<div class="container">
				<p class="item  error">Error al cargar la información de <b>%s</b></p>
			</div>
		', $_POST['candidato_id']);
	} else {
		$template_ca = '<div class="container-sm">
		<div  class="table-responsive"><h3>VISTA INDIVIDUAL DE CANDIDATOS</h3>
			<table  class="table table-striped table-hover table-sm">
			<tr>
				<th>Nombre</th>
				<th>Aspirante</th>
				<th>Foto</th>
				<th>Número tarjeton</th>
				<th>Nombre de la foto</th>
			</tr>';

		foreach ($ca as $value) {
								
		$template_ca.='
							<tr>
							<td><input type="text" name="name" placeholder="candidatos" value='.$value['name'].' required readonly></td>
							<td><input type="text" name="aspirante" placeholder="candidatos" value='.$value['aspirante'].' required readonly></td>
							<td><img src='.$direcorio.$value['foto'].' style="max-width:15%; height: auto;"></td>
							<td><input type="text" name="candidato_id" placeholder="candidato_id" value='.$value['candidato_id'].' readonly></td>
							<td><input type="text" name="foto" placeholder="foto" value='.$value['foto'].' required readonly></td>
							</tr>';
								}	
		$template_ca.='
			</table>
			<input class="btn btn-primary" type="button" value="Regresar" onclick="history.back()">
			</div></div>
		';
		print($template_ca);
	}

} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}
?>