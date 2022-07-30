<?php 
if( isset($_SESSION['role']) == 'Admin' ){ 

$alumnos = new AlumnosController();
$estudiantes = $alumnos->get();
$direcorio ="public/img/candidatos/";
asort($estudiantes);

if( empty($estudiantes) ) {
	print( '
		<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
			<h5>Gestión de alumnos</h5>
			<p class="text-danger fs-6">¡No hay Alumnos registrados!</p>
		
		<div class="table-resposive">
		<table  class="table table-striped table-hover table-sm">
			<tr>
				<th>Token</th>
				<th>Voto</th>
				
				<th colspan="3">
					<form method="POST">
						<input type="hidden" name="r" value="alumnos-add">
						<input class="btn btn-success" type="submit" value="Agregar">
					</form>
				</th>
			</tr>
			</table>
		</div>
		</div>
</div>
	');
} else {
	$template_ca = '<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
	<div class="table-resposive">
	<p class="text-dark fs-5">GESTIÓN DE ALUMNOS</p>
		<table  class="table table-striped table-hover table-sm">
			<tr>
				<th>Token</th>
				<th>Voto</th>
				<th>
					<form method="POST">
						<input type="hidden" name="r" value="alumnos-add">
						<input class="btn btn-success" type="submit" value="Agregar">
					</form>
				</th>
				<th>
					<form method="POST">
						<input type="hidden" name="r" value="alumnos-buscar" >
						
						<input type="text" name="token_pass" placeholder="Ingrese el token">
						<input class="btn btn-primary" type="submit" value="Buscar">
					</form>
				</th>
			</tr>';

	foreach ($estudiantes as $value) {
		# code...
	
		$template_ca .= '
			<tr>
				<td>'. $value['pass_token'] .'</td>
				<td>'. $value['voto_alumno'] .'</td>				
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="alumnos-edit">
						<input type="hidden" name="pass_token" value="'. $value['pass_token'] . '">
						<input class="btn btn-warning" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="alumnos-delete">
						<input type="hidden" name="pass_token" value="'. $value['pass_token'] . '">
						<input class="btn btn-danger" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_ca .= '
		</table>
	</div>
	';

	print($template_ca);
	

	if(isset($_POST['buscar'])){
		print("Aca");
	}
}
}
else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>