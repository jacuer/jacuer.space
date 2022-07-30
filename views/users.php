<?php
if( isset($_SESSION['role']) == 'Admin' ){ 

print('<div class="container-sm  bg-success p-2 text-dark bg-opacity-10"><p class="text-dark fs-5">GESTIÓN DE USUARIOS</p><form method="POST">
<i class="bi bi-file-earmark-pdf"><input type="submit" name="r" value="reporte" class="btn btn-primary"></i></form>');

$usuarios = new UsersController();
$users = $usuarios->get();
$direcorio ="public/img/candidatos/";
asort($users);

if( empty($users) ) {
	print( '
		<div class="row">
			<p class="">No hay Usuarios registrados</p>
		</div>
	');
} else {
	$template_ca = '
	<div class="row">
	<div class="table-responsive">
		<table  class="table table-striped table-hover">
			<tr>
				<th>Nombre</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Rol</th>
				<th>Institución</th>
				
				<th colspan="3">
					<form method="POST">
						<input type="hidden" name="r" value="users-add">
						<input class="btn btn-success" type="submit" value="Agregar">
					</form>
				</th>
			</tr>';

	foreach ($users as $value) {
		# code...
	
		$template_ca .= '
			<tr>
				<td>'. $value['name'] .'</td>
				<td>'. $value['user'] .'</td>
				<td>'. $value['email'] .'</td>
				<td>'. $value['role'] .'</td>
				<td>'. $value['institucion'] .'</td>
				
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="users-edit">
						<input type="hidden" name="user" value="'. $value['user'] . '">
						<input class="btn btn-warning" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="users-delete">
						<input type="hidden" name="user" value="'. $value['user'] . '">
						<input class="btn btn-danger" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_ca .= '
		</table>
	</div>
</div>
	';

	print($template_ca);
}
}//end role admin
else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>