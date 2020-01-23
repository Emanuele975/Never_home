﻿<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">-->
  <!--<link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">-->
  <link rel="stylesheet" href="\Never_home\Smarty\smarty-dir\templates\css\wireframe.css?ts=<?=time()?>&quot" type="text/css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand text-primary" href="/Never_home">NH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Amministratore/HomeAmministratore">Account<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Amministratore/Logout">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
      <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" name="nomericerca">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="py-5 text-left" >
  <div class="container">
    <div class="row ml-5">
      <strong> Cerca commento  :</strong>
      <form class="form-inline my-2 my-lg-0 ml-3" method="post" enctype="multipart/form-data" action="/Never_home/Amministratore/Cercacommentotesto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="testo">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
    <div class="row mr-5">
      <div class="col-md-12">
        <div class="panel-body text-dark">
          <br>
          <ul class="media-list">
            {section name=evento loop=$eventi}
              <li class="media py-2">

                <div class="media-body px-2 text-light">
                  <strong class="text-primary"><b>{$eventi[evento]->getNome()}</b></strong>
                  <p> {$eventi[evento]->getDescrizione()} </p>
                </div>
                <form method="post" enctype="multipart/form-data" action="/Never_home/Amministratore/sbloccacommento/{$commenti[commento]->getId()}/{$num}">
                  <button class="btn btn-primary my-2" type="submit" > Elimina </button>
                </form>
              </li>
            {/section}
          </ul>

        </div>
      </div>
    </div>
  </div>

  <br><br><br><br>



</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>