<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{BASE_URL}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./app/views/css/estilo.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>PELICULAS</title>
</head>

<body>
  <header>
    <img src="img/portada.jpg" class="portada">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="listaPelis">Peliculas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listaEstudios">Estudios</a>
            </li>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
               <ul class="navbar-nav">
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Categoria
                   </a>
                   <ul class="dropdown-menu dropdown-menu-dark">
                                {foreach from=$estudios item=$estudio}
                                    <li><a class="dropdown-item" href="filter/{$estudio->id_nombre_fk}">{$estudio->nombre_estudio}</a></li>
                                {/foreach}
                            </ul>
                   <ul class="dropdown-menu dropdown-menu-dark">
                   {foreach from=$estudios item=$est}
                    <li><a class="dropdown-item" href="{$est->fk_estudio}">{$est->nombre_estudio}</a></li>
                   {/foreach}
                   </ul>
                 </li>
               </ul>
             </div>
          </ul>
        </div>
            {if !isset($smarty.session.USER_ID)}
              <a href="login"><button class="btn btn-outline-light login" type="button">Login</button></a>
              {else} 
                <span><p style="color:#777777">User: {$smarty.session.USER_EMAIL}</p></span>
              <a href="logout"><button class="btn btn-outline-light logout" type="button">Logout</button></a>
             {/if}
         </div>
      </div>
    </nav>
</header>
<!-- inicio main container -->
<main class="container"> 