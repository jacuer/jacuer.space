<?php 
if( $_POST['r'] == 'alumnos-buscar' && isset($_POST['token_pass']) ) {

	$alumnos = new AlumnosController();
	$grupo = $alumnos->get( $_POST['token_pass']);
	
	asort($grupo);

	$token = $_POST['token_pass'];	
	//var_dump($_REQUEST, $grupo);
	if( empty($grupo)){
		
		
		print('<div class="container-sm">
		
		<div class="row bg-success p-2 text-danger bg-opacity-10 fs-4">¡Upps Token no encontrado!</div>
		</div>');
	}else{

	foreach ($grupo as $value) {
			# code...
		
		$template_ca= '<div class="container-sm  bg-success p-2 text-dark bg-opacity-10">
							<div class="fs-4 text-dark">Token del estudiante encontrado</dvi>		
						<table  class="table table-striped table-hover">
							<tr>
								<th>Token</th>
								<th>Voto</th>
							</t3>
							<tr>
								<td>'. $value['pass_token'] .'</td>
								<td>'. $value['voto_alumno'] .'</td>								
							</tr>
							</table>
					</div>
						'; 
	}
	printf(
		$template_ca);
	}
	
} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}
?>