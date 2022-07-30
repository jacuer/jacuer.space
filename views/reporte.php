<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Bienvenidos Gobierno Escolar">
  <link rel="shortcut icon" href="./public/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="./public/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="./public/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./public/css/style.css">  
  <title>Elecciones a consejos escolares</title>
</head>
<body>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
print('<h5 class="">GESTIÓN DE USUARIOS</h5>');

$usuarios = new UsersController();
$users = $usuarios->get();
$direcorio ="public/img/candidatos/";
asort($users);

if( empty($users) ) {
	print( '
		<div class="row">
			<p class="">No hay Usuarios registrados</p>
		</div>
	');
} else {
	$template_ca = '
	<div class="row">
	<div class="table-responsive">
		<table  class="table table-striped table-hover">
			<tr>
				<th>Nombre</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Rol</th>
				<th>Institución</th>
				
				<th colspan="3">
					
				</th>
			</tr>';

	foreach ($users as $value) {
		# code...
	
		$template_ca .= '
			<tr>
				<td>'. $value['name'] .'</td>
				<td>'. $value['user'] .'</td>
				<td>'. $value['email'] .'</td>
				<td>'. $value['role'] .'</td>
				<td>'. $value['institucion'] .'</td>
				
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>
		'; 
	}

	$template_ca .= '
		</table>
	</div>
</div>
</body>
</html> 
	';

	print($template_ca);
}
$html = ob_get_clean();
//echo $html;



require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$donpdf = new Dompdf();


$options = $donpdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$donpdf->setOptions($options);

$donpdf->loadHtml($html);
$donpdf->setPaper('letter');
//$donpdf->setPaper("A4","landscape"); //horizontal
$donpdf->render();
$donpdf->stream("reporte.pdf", array("Attachment" =>false));

$f;
$l;
if(headers_sent($f,$l))
{
    echo $f,'<br/>',$l,'<br/>';
    die('now detect line');
}
//$dompdf->stream('document.pdf');
?>