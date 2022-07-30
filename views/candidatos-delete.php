<?php 
$candidatos_controller = new CandidatosController();

if( $_POST['r'] == 'candidatos-delete' && $_SESSION['role'] == 'Admin' && ! isset($_POST['crud']) ) {

	$candidatos = $candidatos_controller->get($_POST['candidato_id']);
	//var_dump($_REQUEST);
	if( empty($candidatos) ) {
		$template = '
			<div class="container-sm">
				<p class="item  error">No existe el candidato <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("candidatos")
				}
			</script>
		';

		printf($template, $_POST['candidato_id']);
	} else {
		$template = '<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
			<h2>Eliminar perfil del candidato</h2>
			<form method="POST">
				<div class="col">¿Estas seguro de eliminar el registro
				<i class="bi bi-backspace-reverse"><mark class="p1">%s</mark>?</i> 
					
				</div>
				<div class="col">
					<input  type="submit" value="SI" class="btn btn-danger">
					<input  type="button" value="NO" onclick="history.back()" class="btn btn-primary">
					<input type="hidden" name="r" value="candidatos-delete">
					<input type="hidden" name="candidato_id" value='.$_POST['candidato_id'].'>
					<input type="hidden" name="crud" value="del">
				</div>
			</form>
		';

		printf($template,$_POST['candidato_id']
		);	
	}

} else if( $_POST['r'] == 'candidatos-delete' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'del' ) {	
	//var_dump($_REQUEST);

	$candidatos = $candidatos_controller->del($_POST['candidato_id']);
	$template = '
	<div class="container">
	<p class="fs-4 text-success"><i class="bi bi-save"></i>Perfil del candidato <b>%s</b> ha sido eliminado</p>
		
	</div>
	<script>
		window.onload = function () {
			reloadPage("candidatos")
		}
	</script>
';
	//header('Location: ./?error=El registro '.$_POST['candidato_id']. '  ha sido eliminado');
	printf($template, $_POST['candidato_id']);
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>