<?php
	
if( ($_SESSION['role'] == 'Admin') && ! isset($_POST['crud'])){


	$template ='<div class="container-sm bg-success p-2 text-dark bg-opacity-10"><h5>CONFIGURACION INICIAL DE LA BASE DE DATOS</h5>
	<p><b class="fs-5 text-danger">¡Atención!</b> Esta opción elimina todos los resultados de las elecciones</p>
	<div class="col">
	
		<form method="POST" class="row">
		<div class="col">
		¿Estas seguro de eliminar todos los datos almacenados?
		</div>
		<div class="p_25">
		<input  type="submit" value="SI" class="btn btn-danger">
		<input  type="button" value="NO" onclick="history.back()" class="btn btn-primary">
		<input type="hidden" name="r" value="restablecer">
		<input type="hidden" name="crud" value="restablecer">
		</div>
		</form>
		</div>	
		</div>';
  printf($template);
} else if( $_SESSION['role'] == 'Admin' && isset($_POST['crud']) ) {	
	//var_dump($_SESSION);
			$restablecer = new RestablecerController();
			$restablecer->set();
			$restablecer->setAlumnos();
		
			$template = '
				<div class="container-sm">
					<div class="col"><p class="fs-4 text-warning"><i class="bi bi-save"></i> !Todos los datos fueron eliminados! </p></div>
				</div>
				<script>
					window.onload = function () {
						reloadPage("admin")
					}
				</script>
			';
		
			printf($template);
	}
else {
		$controller = new ViewController();
		$controller->load_view('error401');
	}
?>