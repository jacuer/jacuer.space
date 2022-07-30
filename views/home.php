<?php
if(! isset($_SESSION['role']))
{


$candidato = new CandidatosController();

$data_candidato = $candidato->get();
sort($data_candidato);
$direcorio ="public/img/candidatos/";
//calcula dinamicamente el tamaño de colspan 
$i= sizeof($data_candidato)/2;
//var_dump($data_candidato);

print('
        <div class="container-sm">
                <div class="row shadow-lg p-3">
                          <div class="col-auto ">Bienvenido Alumno <b>'. $_SESSION['user']. '</b></div>
                            <div class="col"><img src="./public/img/modal2.png" class="imag-1" ></div>
                          </div>
                    
                <div class="row mt-3">
');
$ca = $candidato->get();

if( empty($ca) ) {
	print( '
		<div class="mb-2 text-danger fs-5">Wouuu..¡Contenido no disponible, ponte en contacto con el administrador!</div>
		        <div class="col">
			        <script>
                                window.onload = function () {
                                        reloadPage("./")
                                }
                                 </script>
				</div>			
	');
        session_unset();
        session_destroy();
} else{

$template_candidato='<div class="container-sm border border-warning rounded-top">
                   <div class="row text-center bg-warning p-2 rounded-top"><b>VOTO POR PERSONERO</b></div> 
                                
                                <form action="" method="POST">
                  <div class="row mt-3">';

        foreach ($data_candidato as $value) 
        {
                        # code...
                        if($value['aspirante'] =='Personero')
                        {
$template_candidato.='    
                        <div class="col text-center"> <img src='.$direcorio.$value['foto'].' class="imag-1 rounded img-fluid">	
                        <span class=""><br><input type="radio" name="personero" value="'. $value['candidato_id'] .'" required style="width:25px;height:25px; cursor:pointer"></span>

                        <br> <span class="bg-secondary p-1 rounded-pill">'. $value['name'] .' </span></br>
                        </div>       
                     ';
                       
                        }
                        

                    }                
$template_candidato.='</div> 
              

        <div class="row mt-3"">
            
                        
                                <div class="col text-center bg-warning p-2"><b>VOTO POR CONTRALOR</b></div>  
        </div> 
                    <div class="row mt-4"">';

        foreach ($data_candidato as $value) 
        {
                    if($value['aspirante'] =='Contralor')
                    {          
$template_candidato.=' <form action="" method="POST"> 
                        
                        <div class="col text-center"> <img src='.$direcorio.$value['foto'].' class="imag-1 rounded img-fluid">	
                        <span class=""><br><input type="radio" name="contralor" value="'. $value['candidato_id'] .'" required style="width:25px;height:25px; cursor:pointer"></span>
                        
                        <br> <span class="bg-secondary p-1 rounded-pill">'. $value['name'] .' </span></br>
                        
                        <input type="hidden" name="votar" value="add-voto">
                                    <input type="hidden" name="mivoto" value="1">
                                    <input type="hidden" name="User" value="'. $_SESSION['user']. '">
                        </div>
                            ';
                        
                    }
                      
        }
                        
$template_candidato.='</div>
                
           
  <div class="mb-3"></div>               
       </div>
</div>
                <div class="row ">
                        <div class="text-center mt-1">
					<input type="hidden" name="r" value="add-voto">
                                <button type="submit" class="btn btn-primary btn-lg mt-3">Votar</button>
                        </div>
                </div>
        </form>

';
print($template_candidato);
}

}else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
?>