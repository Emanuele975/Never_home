<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">-->
  <!--<link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">-->
  <link rel="stylesheet" href="\Never_home\Smarty\smarty-dir\templates\css\wireframe.css?ts=<?=time()?>&quot" type="text/css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a href="/Never_home">
    <img class="navbar-brand "  src="/Never_home/images/logoneverhome.png" style="width: 70px;height: 60px;" >
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">


      <li class="nav-item active">
        <a class="btn navbar-btn mx-2 btn-outline-primary" href="/Never_home/Utente/Logout">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="py-5 text-center" style="background-size:cover;">

  <div class="text-primary"  >

    <h1>
    {$utente->getNome()} {$utente->getCognome()} </h1>
  </div>

<br><br><br>


<div class="container">
  <div class="row mx-md-n5">
      <div class="col-sm-6">
        <form action="/Never_home/Utente/FormCarta" method="post">
          <button type="submit" class="btn  btn-dark text-primary btn-lg btn-block border-primary" name="Carta" value="T">Aggiungi carta</button>
        </form>
        <br>
        <form action="/Never_home/Utente/prossimieventigratuiti" method="post">
          <button type="submit" class="btn  btn-dark text-primary btn-lg btn-block border-primary" name="Carta" value="T">Eventi Gratis</button>
        </form>
        <br>
        <form action="/Never_home/Utente/prossimieventipagamento" method="post">
          <button type="submit" class="btn  btn-dark text-primary btn-lg btn-block border-primary" name="Carta" value="T">Eventi a Pagamento</button>
        </form>
        <br>
        {if $pieno eq false}
        <form action="/Never_home/Utente/ituoibiglietti" method="post">
          <button type="submit" class="btn btn-dark text-primary btn-lg btn-block border-primary" name="Modifica" value="S">Visualizza tutti i tuoi biglietti</button>
        </form>
        {/if}
     </div>
      <div class="col-sm-6">
      <div class="list-group ">
        {if $evento1 eq null}
        <a href="/Never_home" class="list-group-item bg-dark border-dark card text-primary  ">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">biglietto non trovato</h5>
            <small></small>
          </div>
          <p class="mb-1">visita un evento!</p>
          <small></small>
        </a>
        {else}
          <a href="/Never_home/Evento/HomeEvento/{$evento1->getId()}/{$evento1->getF()}/1" class="list-group-item bg-dark border-dark card text-primary list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Nome: {$evento1->getNome()}</h5>
              <small>Data: {$evento1->getData()->format('Y-m-d')}</small>
            </div>
            <p class="mb-1">Descrizione: {$evento1->getDescrizione()}</p>
            <small>importo speso {$biglietto1->getPrezzo()}</small>
          </a>
        {/if}
        {if $evento2 eq null}
        <a href="/Never_home" class="list-group-item bg-dark border-dark card text-primary list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">biglietto non trovato</h5>
            <small class="text-muted"></small>
          </div>
          <p class="mb-1">visita un evento!</p>
          <small class="text-muted"></small>
        </a>
        {else}
        <a href="/Never_home/Evento/HomeEvento/{$evento2->getId()}/{$evento2->getF()}/1" class="list-group-item bg-dark border-dark card text-primary list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Nome: {$evento2->getNome()}</h5>
            <small class="text-primary">Data: {$evento2->getData()->format('Y-m-d')}</small>
          </div>
          <p class="mb-1 ">Descrizione: {$evento2->getDescrizione()}</p>
          <small class="text-primary">importo speso {$biglietto2->getPrezzo()}</small>
        </a>
         {/if}
        {if $evento3 eq null}
        <a href="/Never_home" class="list-group-item bg-dark border-dark card text-primary list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">biglietto non trovato</h5>
            <small class="text-muted"></small>
          </div>
          <p class="mb-1">visita un evento!</p>
          <small class="text-muted"></small>
        </a>
        {else}
          <a href="/Never_home/Evento/HomeEvento/{$evento3->getId()}/{$evento3->getF()}/1" class="list-group-item bg-dark border-dark card text-primary list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Nome: {$evento3->getNome()}</h5>
              <small class="text-muted">Data: {$evento1->getData()->format('Y-m-d')}</small>
            </div>
            <p class="mb-1">Descrizione: {$evento1->getDescrizione()}</p>
            <small class="text-primary">importo speso {$biglietto1->getPrezzo()}</small>
          </a>
        {/if}
      </div>
    </div>
  </div>

<br>
</div>
</div>


</body>

</html>