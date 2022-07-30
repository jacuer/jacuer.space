<?php 
if( $_POST['r'] == 'users-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {
	print('
	<div class="container-sm bg-success p-2 text-dark bg-opacity-10"><h3>AGREGAR USUARIOS</h3>
	<form action="" method="POST">	 
		<table  class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<th>Usuario</th>
			<th>Email</th>
			<th>Contraseña</th>
			<th>Rol</th>
			<th>Institución</th>
		</tr>
			<td><input type="text" name="name" placeholder="Nombre" required></td>
			<td><input type="text" name="user" placeholder="Usuario" required></td>	
			<td><input type="email" name="email" placeholder="Email" required></td>	
			<td><input type="password" name="pass" placeholder="Rol" required></td>	
			<td><select name="role" class="form-select" aria-label="Default select example" required>
					<option selected value="">--Seleccione--</option>
					<option value="Admin">Admin</option>
					<option value="User">User</option>
		  		</select>
		  	</td>	
			<td><input type="text" name="institucion" placeholder="Institución Edu." required></td>	
		</tr>				
	</table>
	
				<input  class="btn btn-success" type="submit" value="Agregar">
				<input type="hidden" name="r" value="users-add">
				<input type="hidden" name="crud" value="set">
	
				<input class="btn btn-primary" type="button" value="Regresar" onclick="history.back()">
		</form>
	');	
} else if( $_POST['r'] == 'users-add' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set' ) {
	$user_controller = new UsersController();
	$buscarUser = $user_controller->get($_POST['user']);
	if( ! empty($buscarUser))
	{
		$template = '
				<div class="container-sm"><h2>El perfil del usuario <mark class="p1">%s</mark> ya existe!</h2>
				<form method="POST" class="row">
						<div class="col">
						¿Si deseas modificarlo, ingresa al menu de editar: 
						</div>
						<div class="col">
						<script>
							window.onload = function () {
								reloadPage("admin")
							}
					</script>
						</div>
					</form></div>
					';

					printf($template,$_POST['user']);	
	}else{
					$new_user = array(
						'user' =>  $_POST['user'], 
						'email' => $_POST['email'], 
						'name' =>  $_POST['name'], 
						'pass' =>  $_POST['pass'],
						'role' =>  $_POST['role'],
						'institucion' =>  $_POST['institucion']
					);

					$user_controller->set($new_user);

					$template = '
						<div class="container">
						<p class="fs-4 text-success"><i class="bi bi-save"></i>Usuario <b>%s</b> salvado</p>
						</div>
						<script>
							window.onload = function () {
								reloadPage("usuarios")
							}
						</script>
					';

					printf($template, $_POST['user']);
		}
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>