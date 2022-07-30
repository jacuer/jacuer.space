<?php 
if( $_POST['r'] == 'alumnos-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {
	print('
	<div class="container-sm bg-success p-2 text-dark bg-opacity-10"><h5>AGREGAR TOKEN ALUMNOS</h5>
	<form action="" method="POST">	 
		<table  class="table table-striped table-hover">
		<tr>
			<th>Token</th>
			<th>Voto</th>
		</tr>
			<td><input type="text" name="pass_token" placeholder="Token" required></td>
			<td><input type="text" name="voto_alumno" placeholder="Voto" required></td>		
		</tr>				
	</table>
	
				<input  class="btn btn-success" type="submit" value="Agregar">
				<input type="hidden" name="r" value="alumnos-add">
				<input type="hidden" name="crud" value="set">
	
				<input class="btn btn-primary" type="button" value="Regresar" onclick="history.back()">
		</form>
	');	
} else if( $_POST['r'] == 'alumnos-add' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set' ) {
	$alumnos_controller = new alumnosController();

	$new_toekn = array(
		'pass_token' =>  $_POST['pass_token'], 
		'voto_alumno' =>  $_POST['voto_alumno']
	);

	$alumnos = $alumnos_controller->set($new_toekn);

	$template = '
		<div class="container-sm">
			<p class="bg-info p-3">Token  <b>%s</b> registrado</p>
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