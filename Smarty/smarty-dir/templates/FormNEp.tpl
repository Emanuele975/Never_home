<!DOCTYPE html>
<html>

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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a href="/Never_home">
    <img class="navbar-brand "  src="/Never_home/images/logoneverhome.png" style="width: 70px;height: 60px;" >
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Luogo/Login">Account <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Luogo/Logout">Logout </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>
</nav>

<br><br>

<form action='/Never_home/Evento/NuovoEventoPagamento/{$tipo}' method="post" enctype="multipart/form-data" novalidate>

  <div class="container">

    <div class="form-row">
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-primary border-dark">Nome Evento</span>
          </div>
          <input type="text" name="NomeE" aria-label="First name" class="form-control" required>
        </div>
      </div>
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text bg-dark text-primary border-dark" for="inputGroupSelect01">Categoria</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="Categoria">
            <option selected>Choose...</option>
            <option value="Teatro">Teatro</option>
            <option value="Concerto">Concerto</option>
            <option value="Partita">Partita</option>
          </select>
        </div>
      </div>
    </div>
    <br>

    <div class="form-row">
      <div class="form-group col-md">
        <div class="input-group flex-nowrap">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-primary border-dark">Data evento</span>
          </div>
          <input type="text" name="Giorno" class="form-control" placeholder="GG" aria-label="GG" aria-describedby="addon-wrapping">
          <div class="input-group-prepend">
            <span class="input-group-text border-dark bg-dark text-primary" id="addon-wrapping0">/</span>
          </div>
          <input type="text" class="form-control" name="Mese" placeholder="MM" aria-label="MM" aria-describedby="addon-wrapping">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark border-dark text-primary" id="addon-wrapping1">/</span>
          </div>
          <input type="text" class="form-control" name="Anno" placeholder="AAAA" aria-label="AAAA" aria-describedby="addon-wrapping">
        </div>
      </div>
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark border-dark text-primary">Prezzo</span>
          </div>
          <input type="text" name="Prezzo" aria-label="Prezzo" class="form-control">
        </div>
      </div>
    </div>
    <br>

    <div class="form-row">
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text border-dark bg-dark text-primary">Posti disponibili</span>
          </div>
          <input type="text" name="Posti" aria-label="Posti disponibili" class="form-control">
        </div>
      </div>
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark border-dark text-primary" id="inputGroupFileAddon01">Upload</span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01"
                   aria-describedby="inputGroupFileAddon01" name="file_inviato">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
        </div>
        <script type="application/javascript">
          $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
          });
        </script>
      </div>
    </div>
    <br>

    <div class="form-row">
      <div class="form-group col-md-6">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-dark border-dark text-primary">Descrizione</span>
          </div>
          <textarea name="descrizione" class="form-control" aria-label="With textarea"></textarea>
        </div>
      </div>
    </div>



  <div class="row my-5">
    <div class="mx-auto">
      <button type="submit" class="btn btn-outline-primary" >Crea Evento</button>
    </div>
  </div>
  </div>

</form>


</body>

</html>