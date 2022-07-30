<?php 
if( $_POST['r'] == 'candidatos-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud']) ) {
	print('
	<div class="container-sm bg-success p-2 text-dark bg-opacity-10">
	<h3>AGREGAR CANDIDATOS</h3>
				<form action="" method="POST" enctype="multipart/form-data">	 
				<table  class="table table-striped table-hover">
					<tr>
						<th>Nombre</th>
						<th>Aspirante</th>
						<th>Foto</th>
						<th>Número tarjetón</th>
						</tr>
						<td><input type="text" name="name" placeholder="Nombre" required></td>
						<td><input type="text" name="aspirante" placeholder="Aspirante" required></td>	
						<td><input type="file" name="archivo" placeholder="" required value="Examinar">
						</td>	
						<td><input type="number" name="candidato_id" placeholder="Número de tarjetón" required></td>	
						</tr>				
						</table>
						
						<input  class="btn btn-success" type="submit" value="Agregar">
						<input type="hidden" name="r" value="candidatos-add">
						<input type="hidden" name="crud" value="set">
						
						<input class="btn btn-primary" type="button" value="Regresar" onclick="history.back()">
						</form>
						');	
} else if( $_POST['r'] == 'candidatos-add' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set' ) {

	$ca_controller = new CandidatosController();
	$buscarCandidato = $ca_controller->get($_POST['candidato_id']);
	if( ! empty($buscarCandidato))
	{
		$template = '
			<div class="container">
				<h2>El perfil del candidato <mark class="p1">%s</mark> ya existe!</h2>
				<form method="POST" class="row">
						<div class="col">
						¿Si deseas modificarlo, ingresa al menu de editar: 
						</div>
						<div class="col">
						<script>
							window.onload = function () {
								reloadPage("candidatos")
							}
					</script>
						</div>
					</form>
			</div>
					';

					printf($template,$_POST['candidato_id']);	
				}
				else{

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
									
									print('<div class="container-sm"><b>Se ha subido correctamente la imagen.</b> 
									</div>'); 

									$new_candidato = array(
										'candidato_id' =>  $_POST['candidato_id'], 
										'name' =>  $_POST['name'], 
										'aspirante' =>  $_POST['aspirante'], 
										'foto' =>  $foto
									);
									$candidatos = $ca_controller->set($new_candidato);
									$template = '
										<div class="container-sm">
										<p class="fs-4 text-success"><i class="bi bi-save">Candidato <b>%s</b> salvado</i></p>
										<img src="public/img/candidatos/'.$archivo.'" width=20px height=auto; >
										</div>
										<script>
											window.onload = function () {
												reloadPage("candidatos")
											}
										</script>
									';
				
									printf($template, $_POST['candidato_id']);  
			
								}else{
									echo '<div class="container-sm"><b>Ocurrio un error al subir la imagen.</b></div>';
								}
							}else{
								echo '<div class="container-sm">¡El tamaño de la imagen no puede superar 1MB!</div>';
			
							}    
			
			
						}
			
						
			 
					}

					

				}
				

} 
			
else {
	$controller = new ViewController();
	$controller->load_view('error401');
	}
?>
