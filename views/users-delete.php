<?php 
$user_controller = new UsersController();

if( $_POST['r'] == 'users-delete' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {
	
	$usuario = $user_controller->get($_POST['user']);

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

		printf($template, $_POST['user']);
	} else {
		$template= '<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
			<h2>Eliminar perfil de usuario </h2>
			<form method="POST" class="row">
				<div class="col">
					¿Estas seguro de eliminar el registro: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  type="submit" value="SI" class="btn btn-danger">
					<input  type="button" value="NO" onclick="history.back()" class="btn btn-primary">
					<input type="hidden" name="user" value='.$_POST['user'].'>
					<input type="hidden" name="r" value="users-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>
		';

		printf($template,$_POST['user']);
	}
} else if( $_POST['r'] == 'users-delete' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'del' ) {	
	

	$us = $user_controller->del($_POST['user']);

	$template = '
		<div class="container-sm">
		<p class="fs-4 text-success"><i class="bi bi-save"></i>Perfil del usuario <b>%s</b> ha sido eliminado</p>
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