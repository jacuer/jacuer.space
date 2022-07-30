<?php 
print('<h5 class="">CONFIGURACION INICIAL DE LA BASE DE DATOS</h5><p><b>¡Atención!</b>Esta opción restablece los valores por defecto</p>');

$candidato = new CandidatosController();
$ca = $candidato->get();
$direcorio ="public/img/candidatos/";
//var_dump($ca);

asort($ca);

if( empty($ca) ) {
	print( '
		<div class="container">
			<p class="">No hay Candidatos</p>
		</div>
	');
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
	$template_ca = '
	<div><p style="color:red">¡Precaución LOS RESULTADOS DE LAS ELECCIONES <b>SERÁN ELIMINADOS PERMANENTEMENTE</b>. Use esta opción antes de comenzar las elecciones!</p>
		<table  class="table table-striped table-hover">
			<tr>
				<th>Número tarjetón</th>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Aspirante</th>
				<th>Total de votos</th>
				
				<th>
					Borrar votos 
				</th>
			</tr>';

	foreach ($ca as $value) {
		# code...
	
		$template_ca .= '
			<tr>
				<td>'. $value['candidato_id'] .'</td>
				<td><img src='.$direcorio.$value['foto'].'></td>
				<td>'. $value['name'] .'</td>
				<td>'. $value['aspirante'] .'</td>			
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="establecer-candidatos">
						<input type="hidden" name="candidato_id" value="'. $value['candidato_id'] . '">
						<input type="hidden" name="crud" value="del">
						<input type="hidden" name="name" value="'. $value['name'] . '">
						<input class="btn btn-danger" type="submit" value="Establecer">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_ca .= '
		</table>
	</div>
	';

	print($template_ca);
}
?>