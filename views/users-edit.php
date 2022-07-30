<?php 
$usuario_controller = new UsersController();

if( $_POST['r'] == 'users-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {

	$usuario = $usuario_controller->get($_POST['user']);

	if( empty($usuario) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el usuario <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("usuarios")
				}
			</script>
		';
		printf(
			$template,
			$candidatos[0]['user']);
//En php los inputs desabilitados no se envian an backend por eso deben ir acompañados de un hidden
//<input type="text" placeholder="candidatos_id" value="%s" disabled required>
//<input type="hidden" name="candidatos_id" value="%s">
//$candidatos[0]['candidatos_id'], evito un input de tipo hidden usando https://www.w3schools.com/tags/att_input_readonly.asp


		printf($template, $_POST['user']);
	} else {
		$template_candidatos = '<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
			<h3 class="p1">MODIFICAR USUARIOS</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="table table-striped table-hover">
					<tr>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Email</th>
						<th>Contraseña</th>
						<th>Rol</th>
						<th>Institución</th>
					</tr>';

		$direcorio ="public/img/candidatos/";
						foreach ($usuario as $value) {
								
		$template_candidatos.='
					<tr>
						<td><input type="text" name="name" placeholder="Nombre" value='.$value['name'].'></td>
						<td><input type="text" name="user" placeholder="Usuario" value='.$value['user'].' readonly></td>
						<td><input type="email" name="email" placeholder="Email" value='.$value['email'].' required></td>
						<td><input type="password" name="pass" placeholder="Contraseña" value="" required></td>
						<td>
							<select name="role" class="form-select" aria-label="Default select example" required>
							<option selected value="'.$value['role'].'">'.$value['role'].'</option>
							<option value="Admin">Admin</option>
							<option value="User">User</option>
							</select>
						</td>
						
						<td><input type="text" name="institucion" placeholder="Institucion" value='.$value['institucion'].' required></td>
					</tr>';
						}
		$template_candidatos.='			
					
					</table>
				 
				
					<input  class="btn btn-warning" type="submit" value="Editar">
					<input type="hidden" name="r" value="users-edit">
					<input type="hidden" name="crud" value="set">
					<input class="btn btn-primary" type="button" value="Regresar" onclick="history.back()">
				</table>
			</form>
		';

		printf(
			$template_candidatos);	
	}

} else if( $_POST['r'] == 'users-edit' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set' ) {	

	$save_usuario = array(
		'user' => $_POST['user'],
		'email' =>$_POST['email'],
		'name' => $_POST['name'],
		'pass' => $_POST['pass'],
		'role' => $_POST['role'],
		'institucion' => $_POST['institucion']
	);

	$usuario_controller->set($save_usuario);

	$template = '
		<div class="container">
		<p class="fs-4 text-success"><i class="bi bi-save"></i>Perfil del usuario <b>%s</b> ha sido modificado</p>
			
		</div>
		<script>
			window.onload = function () {
				reloadPage("usuarios")
			}
		</script>
	';

	printf($template, $_POST['user']);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}

?>