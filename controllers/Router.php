<?php 
class Router {
	public $route;

	public function __construct($route) {
	
		$session_options = array(
			'use_only_cookies' => 1,
			'auto_start' => 1,
			'read_and_close' => true
		);

				if( !isset($_SESSION) )  session_start($session_options);

				if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;


		if($_SESSION['ok']) {
			
				//Aqui ira nuestra programación de la web
				//vamos a crear un controlador de vista  con todas las rutas de nuestra
				$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
				$controller = new ViewController();

				switch ($this->route) {
					
					case 'home':
						if( !isset( $_POST['r'] ) )$controller->load_view('home');
						else if( $_POST['r'] == 'add-voto' )  $controller->load_view('add-voto');
						break;
					case 'VotosView':
						if( !isset( $_POST['r'] ) )  $controller->load_view('VotosView');
						else if( $_POST['r'] == 'candidatos-add' )  $controller->load_view('candidatos-add');
						else if( $_POST['r'] == 'candidatos-edit' )  $controller->load_view('candidatos-edit');
						else if( $_POST['r'] == 'candidatos-delete' )  $controller->load_view('candidatos-delete');
						else if( $_POST['r'] == 'candidatos-show' )  $controller->load_view('candidatos-show');
						
						break;
					case 'usuarios':
						if( !isset($_POST['r']) )$controller->load_view('users');
						else if( $_POST['r'] =='users-add' ) $controller->load_view('users-add');
						else if( $_POST['r'] =='users-edit' ) $controller->load_view('users-edit');
						else if( $_POST['r'] =='users-delete' ) $controller->load_view('users-delete');
						else if( $_POST['r'] =='reporte' ) $controller->load_view('reporte');
						
						break;
					
					case 'alumnos':
						if( !isset($_POST['r']) )$controller->load_view('alumnos');
						else if( $_POST['r'] =='alumnos-add' ) $controller->load_view('alumnos-add');
						else if( $_POST['r'] =='alumnos-edit' ) $controller->load_view('alumnos-edit');
						else if( $_POST['r'] =='alumnos-delete' ) $controller->load_view('alumnos-delete');
						else if( $_POST['r'] =='alumnos-buscar' ) $controller->load_view('alumnos-buscar');
						
						break;
					case 'votos':
						if( !isset($_POST['r']) )$controller->load_view('votos');
						else if( $_POST['r'] =='votos-candidatos' ) $controller->load_view('votos-candidatos');
						else if( $_POST['r'] =='votos-edit' ) $controller->load_view('votos-edit');
						else if( $_POST['r'] =='votos-delete' ) $controller->load_view('votos-delete');
							
						break;
					case 'admin':
							if( !isset($_POST['r']) )$controller->load_view('admin');								
							break;
					case 'candidatos':
						if( !isset($_POST['r']) )$controller->load_view('candidatos');
						else if( $_POST['r'] =='candidatos-add' ) $controller->load_view('candidatos-add');
						else if( $_POST['r'] =='candidatos-show' ) $controller->load_view('candidatos-show');
						else if( $_POST['r'] =='candidatos-edit' ) $controller->load_view('candidatos-edit');
						else if( $_POST['r'] =='candidatos-delete' ) $controller->load_view('candidatos-delete');
								
						break;
					case 'restablecer':
						if( !isset($_POST['r']) )$controller->load_view('restablecer');
						else if( $_POST['r'] =='restablecer' ) $controller->load_view('restablecer');
									
						break;
					case 'reiniciarcandidatos':
						if( !isset($_POST['r']) )$controller->load_view('reiniciarcandidatos');
						else if( $_POST['r'] =='establecer-candidatos' ) $controller->load_view('establecer-candidatos');
					
						break;
					case 'salir':
						$user_session = new SessionController();
						$user_session->logout();
						break;		
					default:
						$controller->load_view('error404');
						break;
				}//end switch

		}else{
				if( ( ! isset($_POST['user']) && ! isset($_POST['pass']) ) ){
					$login_form = new ViewController();
					$login_form->load_view('login');					
				}else{ 
					$user_session = new SessionController();
					$session = $user_session->login( trim($_POST['user']), trim($_POST['pass']) );
					if(empty($session ) ){
						$login_form = new ViewController();
						if(! headers_sent() ){
							header('Location: ./?error=El usuario '.$_POST['user']. ' y el password proporcionado no coinciden');
							printf($_POST['user']);						
						}
					}else{
						foreach ($session as $row) {
							$_SESSION['user'] 	= $row['user'];
							$_SESSION['name'] 	= $row['name'];							
							$_SESSION['email'] 	= $row['email'];
							$_SESSION['role'] 	= $row['role'];
							$_SESSION['institucion'] 	= $row['institucion'];
						}
								$_SESSION['ok'] = true;
								header('Location: ./admin');								
					}		
				}
		}	//end admin
		
					if( isset($_POST['alumno']) ) {			
						$user_session = new SessionController();
						$sessionAlumno = $user_session->login_alumno( trim (strtoupper(($_POST['user']))) );					
						if(empty($sessionAlumno)){
							header('Location: ./?error=El toquen '.$_POST['user']. ' no coincide');
							printf($_POST['user']);
							$login_form = new ViewController();
							$login_form->load_view('login');									
						}else{
							foreach ($sessionAlumno as $row) {
							$_SESSION['user'] = $row['pass_token'];
							$_SESSION['pass'] = $row['voto_alumno'];
							}
							$_SESSION['ok'] = true;
							header('Location: ./');							
					
						}	
					}		
	}//end construct
	public function __destruct() {
		unset($this->route);
	}	
}
?>