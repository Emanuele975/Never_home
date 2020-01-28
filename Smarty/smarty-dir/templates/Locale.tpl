<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">-->
  <!-- <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">-->
  <link rel="stylesheet" href="\Never_home\Smarty\smarty-dir\templates\css\wireframe.css?ts=<?=time()?>&quot" type="text/css">
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
        <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Luogo/Logout">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
      <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Search" name="nomericerca">
      <button class="btn btn-primary" type="submit">Cerca</button>
    </form>
  </div>
</nav>
<div class="py-5 text-center" style="background-size:cover;">

  <p class=" text-primary font-weight-bold" style="font-size: 50px" >
     {$nome}
   </p>

  <br>

<div class="container ">

  <div class="row mx-md-n5">

    <div class="col-sm-6">
      <form action="/Never_home/Evento/FormEvento/G" method="post">
      <button type="submit" class="btn btn-dark btn-lg border-primary btn-block  text-primary" name="EventoG"  >
        Crea evento gratis
      </button>
      </form>
      <br>
      <form action="/Never_home/Evento/FormEvento/P" method="post">
      <button type="submit" class="btn btn-dark btn-lg border-primary btn-block text-primary" name="EventoP"  >
        Crea evento a pagamento
      </button>
      </form>
      <br>
      <form action="/Never_home/Luogo/ituoieventi" method="post">
        <button type="submit" class="btn btn-dark btn-lg  border-primary btn-block text-primary" name="Listaeventi" value="L" >
          I tuoi eventi
        </button>
      </form>
    </div>
    <div class="col-sm-4">
      <div class="container ">
        {if $evento==null}
          <div class="list-group bg-">
            <a href="#" class="list-group-item  ">
              <div class="d-flex w-200 justify-content-between" >
                <h4 class="mb-1 text-primary" style="width: 400px"> Nessun evento creato</h4>
              </div>
            </a>
            <img   class="img-fluid d-block w-200 " src="/Never_home/images/download.png" style="width: 400px;	height: 200px;" >
          </div>
        {else}
          <div class="list-group">
            <a href="/Never_home/Evento/HomeEvento/{$evento->getId()}/{$evento->getF()}/1" class="list-group-item ">
              <div class="d-flex w-100 justify-content-between" >
                <h5 class="mb-1 text-primary"> {$evento->getNome()}</h5>
                <small class="text-primary"> {$evento->getData()->format('d-m-Y')}</small>
              </div>
              <p class="mb-1"> {$evento->getDescrizione()} </p>
            </a>
            {$img2 = base64_encode($img->getData())}
            <img class="img-fluid d-block " src="data:{$img->getType()};base64,{$img2}" style="width: 400px;	height: 250px;">
          </div>
        {/if}
      </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
  <br><br><br><br>



</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>