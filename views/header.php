<?php
print('<!DOCTYPE html><html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Bienvenidos Gobierno Escolar, software electronico colegios, voto electronico, consejos escolares">
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
');

if( ($_SESSION['ok']) && isset($_SESSION['role']))
{
    $template=' <header class="container-sm bg-success p-2 text-dark bg-opacity-10">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="public/img/modal1.png" style="width:25px; heigth:auto"> Gobierno Escolar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll ms-auto" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin">Home</a>
            </li>           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Administrator
              </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item" href="usuarios">Usuarios</a></li>
                  <li><a class="dropdown-item" href="candidatos">Candidatos</a></li>
                  <li><a class="dropdown-item" href="alumnos">Alumnos</a></li>
                  <li><a class="dropdown-item" href="votos">Resultados</a></li>             
              </ul>
            </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Settings
              </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">                
                  <li><a class="dropdown-item" href="restablecer">Restablecer</a></li>                  
              </ul>
            </li>
             <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="salir" title="Cerrar sesión">Salir</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" aria-current="page" href="">|</a>
          </li>
            <li class="nav-item ">
              <span class="nav-link text-success fw-semibold borde bg-opacity-60"> Bienvenido(a) '.$_SESSION['name'].'</span>
            </li>
          </ul>        
        </div>
      </div>
    </nav>
    </header>       
';
printf($template);

}
?>