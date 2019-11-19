<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
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
        <a class="nav-link btn btn-dark btn-outline-primary mx-2 text-primary" href="#">Account <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link btn  btn-outline-primary mx-2 text-primary " href="#">Notifiche </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link  btn btn-dark btn-outline-primary mx-2 text-primary" href="/Never_home/Luogo/Logout">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="py-5 text-center" style="background-image: url('https://images.pexels.com/photos/1587927/pexels-photo-1587927.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260');background-size:100% 100%;">
<div class="container ">
  <div class="row">
    <br>
  </div>
  <div class="row mx-md-n5">
    <div class="col-sm-8">
      <form action="/Never_home/Evento/FormEvento" method="post">
      <button type="submit" class="btn btn-dark btn-lg btn-block" name="EventoG" value="G" style="width: 200px;	height: 50px;">
        Crea evento gratis
      </button>
      <button type="submit" class="btn btn-dark btn-lg btn-block" name="EventoP" value="P" style="width: 300px;	height: 50px;">
        Crea evento a pagamento
      </button>
        <button type="submit" class="btn btn-dark btn-lg btn-block" name="Listaeventi" value="L" style="width: 300px;	height: 50px;">
          I tuoi eventi
        </button>
      </form>
    </div>
    <div class="col-sm-4">
      <div class="container">
        {if $evento==null}
          {else}
          <div class="list-group">
            <a href="/Never_home/Evento/HomeEvento/{$evento->getId()}/{$evento->getF()}/1" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between" >
                <h5 class="mb-1">nome evento: {$evento->getNome()}</h5>
                <small class="text-muted">data evento : {$evento->getData()->format('d-m-Y')}</small>
              </div>
              <p class="mb-1">descrizione: {$evento->getDescrizione()} </p>
            </a>
            {$img2 = base64_encode($img->getData())}
            <img class="img-fluid d-block " src="data:{$img->getType()};base64,{$img2}" style="width: 400px;	height: 250px;">
          </div>
        {/if}
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