<?php 
if( $_POST['r'] == 'add-voto' && $_SESSION['user'] == $_POST['User'] && isset($_POST['votar']) ) {
	
	$alumno = new AlumnosController();
	$consulta = $alumno->get($_POST['User']);
	foreach ($consulta as $value) {
		$verificado = $value['voto_alumno'];
	}

	if($verificado == 0)
	
	{
		$voto_controller = new VotosController();
		$voto_personero = array(
			'votacion_id' =>  $_POST['personero'], 
			'voto_candidato' => $_POST['mivoto']
		);
		$voto_contralor = array(
			'votacion_id' =>  $_POST['contralor'], 
			'voto_candidato' => $_POST['mivoto']
		);
		$voto_controller->setSuma($voto_personero);
		$voto_controller->setSuma($voto_contralor);
		$confirmar_voto = array(
			'pass_token' =>  $_POST['User'], 
			'voto_alumno' => 1
		);
		$alumno->set($confirmar_voto);
	

	/* $template = '
		<div class="container">
			<p class="item  add">Gracias <b>%s</b> por tu voto.</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("./");
			}
		</script>
	';
	*/
	session_unset();
	session_destroy();
	
	header('Location: ./?error=Gracias por tu voto');

	}else{

		session_unset();
		session_destroy();
		header('Location: ./?error=El token '.$_POST['user']. '  proporcionado ya fue utilizado');
	
	
 
	}
	
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>