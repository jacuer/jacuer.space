<?php 
$candidatos_controller = new CandidatosController();

if( $_POST['r'] == 'candidatos-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {

	$candidatos = $candidatos_controller->get($_POST['candidato_id']);

	if( empty($candidatos) ) {
		$template = '
			<div class="container-sm">
				<p class="item  error">No existe el candidatos_id <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("candidatos")
				}
			</script>
		';
		printf(
			$template,
			$candidatos[0]['candidato_id']);
//En php los inputs desabilitados no se envian an backend por eso deben ir acompañados de un hidden
//<input type="text" placeholder="candidatos_id" value="%s" disabled required>
//<input type="hidden" name="candidatos_id" value="%s">
//$candidatos[0]['candidatos_id'], evito un input de tipo hidden usando https://www.w3schools.com/tags/att_input_readonly.asp


		printf($template, $_POST['candidato_id']);
	} else {
		$template_candidatos = '<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
		<div class="table-responsive">
			<h3 class="p1">MODIFICAR CANDIDATOS</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<table  class="table table-striped table-hover table-sm">
					<tr>
						<th>Número Tarjetón</th>
						<th>Nombre</th>
						<th>Aspirante</th>
						<th>Foto</th>
						<th>Examinar</th>
					</tr>';

		$direcorio ="public/img/candidatos/";
						foreach ($candidatos as $value) {
								
		$template_candidatos.='
					<tr>
						<td><input type="text" name="candidato_id" placeholder="candidato_id" value='.$value['candidato_id'].' readonly size=4></td>
						<td><input type="text" name="name" placeholder="candidatos" value='.$value['name'].' required></td>
						<td><input type="text" name="aspirante" placeholder="candidatos" value='.$value['aspirante'].' required size=10></td>
						<td><img src="public/img/candidatos/'.$value['foto'].'" style="width:50px; height: auto;"></td>		
						<td><input type="file" name="archivo" placeholder="" required value="Examinar">
					</tr>';
						}
		$template_candidatos.='			
					
					</table>
				 
				
					<input  class="btn btn-warning" type="submit" value="Editar">
					<input type="hidden" name="r" value="candidatos-edit">
					<input type="hidden" name="crud" value="set">
					<input class="btn btn-primary" type="button" value="Regresar" onclick="history.back()">
				</table>
			</form></div>
		';

		printf(
			$template_candidatos,
			$candidatos[0]['candidato_id'],
			$candidatos[0]['name'],
			$candidatos[0]['aspirante'],
			$candidatos[0]['foto']
		);	
	}

} else if( $_POST['r'] == 'candidatos-edit' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set' ) {	


	$archivo = $_FILES['archivo']['name'];
            		$temporal = $_FILES['archivo']['tmp_name'];

					if (  isset($archivo) != '') {
        
						$name = pathinfo($archivo, PATHINFO_FILENAME);
						$extension = pathinfo($archivo, PATHINFO_EXTENSION);
						$size = filesize($temporal);
						$formatos = array('jpg','jpeg','png','gif');
						$foto = $name.'.'.$extension;

						if( ! in_array($extension, $formatos)){
							print('<div class="container-sm text-danger">¡Error formato no permitido!</div>');
							//return;
						}else{
			
							if($size < 1024000) {
			
								if(move_uploaded_file($temporal, 'public/img/candidatos/'.$archivo)){
									
									$save_candidatos = array(
										'candidato_id' => $_POST['candidato_id'],
										'name' => $_POST['name'],
										'aspirante' => $_POST['aspirante'],
										'foto' => $foto
									);
								
									$candidatos = $candidatos_controller->set($save_candidatos);
								
									$template = '
									<div class="container">
									<p class="fs-4 text-success"><i class="bi bi-save"></i>Perfil del candidato <b>%s</b> ha sido modificado</p>
									<img src="public/img/candidatos/'.$archivo.'" width=25px; height=auto; ></div>
										
									</div>
									<script>
										window.onload = function () {
											reloadPage("candidatos")
										}
									</script>
								';
								
									printf($template, $_POST['name']);
			
								}else{
									echo '<div class="container-sm text-danger"><b>Ocurrio un error al subir la imagen.</b></div>';
								}
							}else{
								
								echo '<div class="container-sm text-danger">¡El tamaño de la imagen no puede superar 1MB!</div>';
								 
			
							}    
			
			
						}
			
						
			 
					}





	
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}

?>