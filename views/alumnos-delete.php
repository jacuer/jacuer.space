<?php 
$alumnos_controller = new AlumnosController();

if( $_POST['r'] == 'alumnos-delete' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {

	$alumnos = $alumnos_controller->get($_POST['pass_token']);

	if( empty($alumnos) ) {
		$template = '
			<div class="container-sm">
				<p class="item  error">No existe el token  <b>%s asignado al alumno</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("alumnos")
				}
			</script>
		';

		printf($template, $_POST['pass_token']);
	} else {
		$template = '<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
			<h2>Eliminar token del alumno</h2>
			<form method="POST">
				<div class="col">
					¿Estas seguro de eliminar el registro: 
					<mark>%s</mark>?
				</div>
				<div class="col">
					<input  type="submit" value="SI" class="btn btn-danger">
					<input  type="button" value="NO" onclick="history.back()" class="btn btn-primary">
					<input type="hidden" name="pass_token" value="'.$_POST['pass_token'].'">
					<input type="hidden" name="r" value="alumnos-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>
		';

		printf($template, $_POST['pass_token']);	
	}

} else if( $_POST['r'] == 'alumnos-delete' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'del' ) {	

	$alumnos = $alumnos_controller->del($_POST['pass_token']);

	$template = '
		<div class="container">
			<p class="bg-danger p-3">Token  <b>%s</b> eliminado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("alumnos")
			}
		</script>
	';

	printf($template, $_POST['pass_token']);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>