<?php if(isset($_GET['error'])) { 

  $templates='
      <div class="container-sm">
      <div class="row bg-info mt-2 p-2 rounded">%s</div>
      </div>
';
  
printf($templates, $_GET['error']);

}
print('
<div class="container-sm ">
<div class="row shadow-lg p-3 mb-3">
      <div class="col-auto">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">@alumno</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@fat">@user</button>
      </div>
      <div class="col"><img src="./public/img/modal2.png" class="imag-1" ></div>
</div>
<!--ALumno-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><img src="./public/img/modal1.png" class="imag-1" >Alumno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="mb-3">
             <i class="bi bi-person"></i><label for="recipient-name" class="col-form-label">usuario</label>
           <input type="text" class="form-control text-uppercase" name="user" required maxlength="7" required placeholder="Ingresa tu token">
            <input type="hidden" class="form-control" id="" name="token">
            <input type="hidden" class="form-control" id="" name="alumno">
            <input type="hidden" class="form-control" id="" name="pass" value="alumno">
          </div>        
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Entrar</button>
		</form>
      </div>
    </div>
  </div>
</div>
<!--User-->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><img src="./public/img/modal1.png" class="imag-1" >Docente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="mb-3">
          <i class="bi bi-person"></i><label for="recipient-name" class="col-form-label">usuario</label>
            <input type="text" class="form-control" id="recipient-name" name="user" maxlength="10" required placeholder="@usuario">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Contraseña</label>
            <input type="password" class="form-control" id="recipient-name" name="pass" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Entrar</button>
		</form>
      </div>
    </div>
  </div>
</div>
</div>

<!--card-->

<div class="container-sm">

<div class="card-group">
  <div class="card">
    <img src="./public/img/pc-4.jpg" alt="...">
    <div class="card-body">
      <h5 class="card-title">Qué es el gobierno escolar</h5>
      <p class="card-text">De acuerdo con el Ministerio de Educación, el Gobierno Escolar es una forma de preparación para la convivencia democrática, por medio de la participación de todos los estamentos de la comunidad educativa en la organización y funcionamiento del Proyecto Educativo Institucional (PEI).</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="./public/img/gallery3.jpg" class="card-img-top h-10" alt="...">
    <div class="card-body">
      <h5 class="card-title">Marco legal</h5>
      <p class="card-text">La fundamentación legal del Gobierno Escolar se encuentra en el artículo 68 de la Constitución Política de Colombia de 1991, en el artículo 142 de la Ley 115 del 08 de febrero de 1994 y en su Decreto reglamentario 1860 del 3 de agosto de 1994.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="./public/img/gallery4.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Quiénes conforman el gobierno escolar</h5>
      <p class="card-text">La comunidad educativa tiene la responsabilidad de elegir a algunos de los miembros de la institución educativa, dependiendo de la normatividad que cada institución adopte. La reglamentación, del gobierno escolar dentro de los colegios públicos y privados, debe estar establecida en el marco de la normatividad emitida por el Ministerio de Educación. </p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
</div>
    ');
?>