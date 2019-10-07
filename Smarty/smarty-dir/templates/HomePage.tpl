﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/Never_home">NH</a>

  <div class="collapse navbar-collapse"  id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li>
        <div class="btn-group btn-dark" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Registrazione
                </button>
                <div class="dark dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class=" dropdown-item" href="/Never_home/Utente/FormRegistrazione">Registrazione utente</a>
                    <a class=" dropdown-item" href="/Never_home/Luogo/FormRegistrazione">Registrazione locale</a>
                </div>
        </div>
      </li>
        <li>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                </button>
                <div class="dark dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dark dropdown-item" href="/Never_home/Utente/Login">Login utente</a>
                    <a class="dark dropdown-item" href="/Never_home/Luogo/Login">Login locale</a>
                </div>
            </div>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
      <button class="btn btn-light" type="submit">Search</button>
    </form>
  </div>
</nav>
  Home page del sito
<br><br>
<div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover;">
    <br>
    <br>

</div>
<form action='/Never_home/Homepage/prova' method="post" enctype="multipart/form-data">
    <input type="text" name="data" aria-label="First name" class="form-control">
<button type="submit">bottone prova</button>
</form>

<div class="fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center d-md-flex justify-content-between align-items-center" >
                <ul class="nav d-flex justify-content-center">
                    <li class="nav-item"> <a class="nav-link active" href="#">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Features</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Pricing</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">About</a> </li>
                </ul>
                <p class="mb-0 py-1" >© 2014-2018 Pingendo. All rights reserved</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>