<?php 
$alumno_controller = new AlumnosController();

if( $_POST['r'] == 'alumnos-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {

	$alumno = $alumno_controller->get($_POST['pass_token']);

	if( empty($alumno) ) {
		$template = '
			<div class="container-sm">
				<p class="item  error">No existe el token del alumno <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("alumnos")
				}
			</script>
		';
		printf(
			$template,
			$candidatos[0]['pass_token']);
//En php los inputs desabilitados no se envian an backend por eso deben ir acompañados de un hidden
//<input type="text" placeholder="candidatos_id" value="%s" disabled required>
//<input type="hidden" name="candidatos_id" value="%s">
//$candidatos[0]['candidatos_id'], evito un input de tipo hidden usando https://www.w3schools.com/tags/att_input_readonly.asp


		printf($template, $_POST['pass_token']);
	} else {
		$template_alumnos = '<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
			<h3 class="p1">MODIFICAR ALUMNOS</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="table table-striped table-hover">
					<tr>
						<th>Token</th>
						<th>Voto</th>
					</tr>';

		$direcorio ="public/img/candidatos/";
						foreach ($alumno as $value) {
								
		$template_alumnos.='
					<tr>
						<td><input type="text" name="pass_token" placeholder="Nombre" value='.$value['pass_token'].'></td>
						<td><input type="text" name="voto_alumno" placeholder="alumno" value='.$value['voto_alumno'].' required></td>						
					</tr>';
						}
		$template_alumnos.='			
					
					</table>		
					<input  class="btn btn-warning" type="submit" value="Editar">
					<input type="hidden" name="r" value="alumnos-edit">
					<input type="hidden" name="crud" value="set">
					<input class="btn btn-primary" type="button" value="Regresar" onclick="history.back()">
				</table>
			</form>
		';

		printf(
			$template_alumnos);	
	}

} else if( $_POST['r'] == 'alumnos-edit' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set' ) {	

	$save_alumno = array(
		'pass_token' => $_POST['pass_token'],
		'voto_alumno' =>$_POST['voto_alumno']
	);

	$alumno_controller->set($save_alumno);

	$template = '
		<div class="container">
		<p class="bg-info p-3">Token  <b>%s</b> modificado</p>
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