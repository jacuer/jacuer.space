<?php
if( isset($_SESSION['role']) ){

if( ($_SESSION['role']) === 'Admin')
{
    $template=' <div class="container-sm  bg-success p-2 text-dark bg-opacity-10">
                     <div class="row">       
                            <div class="col">
                                <h2>Gestión del sistema</h2>
                                <h3>Bienvenido '.$_SESSION['user'].'</h3>
                                <p>Estas logueado como <b>'.$_SESSION['role'].'</b></p>
                            </div>
                        </div>
                    </div>
                </div>   
';
printf($template);

}else if( ($_SESSION['role']) === 'User')
{
    $template=' <div class="container-sm  bg-success p-2 text-dark bg-opacity-10">
                     <div class="row">       
                            <div class="col">
                                <h2>Gestión del sistema</h2>
                                <h3>Bienvenido '.$_SESSION['user'].'</h3>
                                <p>Estas logueado como <b>'.$_SESSION['role'].'</b></p>
                            </div>
                        </div>
                    </div>
                </div>   
';
printf($template);

}
}else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>