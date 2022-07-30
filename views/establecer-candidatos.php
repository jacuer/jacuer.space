<?php 
$votos_controller = new VotosController();

if( $_POST['r'] == 'establacer-candidatos' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {

	$votos = $votos_controller->get($_POST['candidato_id']);

	if( empty($votos) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el candidato <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("votos")
				}
			</script>
		';

		printf($template, $_POST['candidato_id']);
	} else {
		$template_v = '
			<h2 class="p1">Eliminar votos del candidato</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar el registro: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  type="submit" value="SI" class="btn btn-danger">
					<input  type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="candidato_id" value="%s">
					<input type="hidden" name="r" value="votos-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>
		';

		printf(
			$template_v,
			$votos[0]['candidato_id'],
		);	
	}

} else if( $_POST['r'] == 'establecer-candidatos' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'del' ) {	
	
	$new_voto = array(
		'votacion_id' =>  $_POST['candidato_id'], 
		'voto_candidato' =>  0
	);
	$votos = $votos_controller->set($new_voto);

	$template = '
		<div class="container">
			<p class="item  delete">Los datos del candiato <b> %s </b>fueron restablecidos</p>
		</div>
		<script>
			voto = document.getElementByid
			window.onload = function () {
				reloadPage("votos")
			}
		</script>
		</div>
	';

	printf($template, $_POST['name']);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}