<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <!--<link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">-->
    <link rel="stylesheet" href="Smarty\smarty-dir\templates\css\wireframe.css?ts=<?=time()?>&quot" type="text/css">
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
                <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Utente/Login">Account <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container">
    <div class="row">
        <pre>

        </pre>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card mb-3 border-dark " style="">
                {$img2 = base64_encode($img->getData())}
                <img class="card-img-top" src="data:{$img->getType()};base64,{$img2}" style="width: 550px;	height: 300px;">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
           <ul class="list-group list-group-flush">
                <li class="list-group-item">nome evento: {$evento->getNome()}</li>
                <li class="list-group-item">descrizione: {$evento->getDescrizione()}</li>
                <li class="list-group-item">categoria: {$evento->getCategoria()->toString()}</li>
                <li class="list-group-item">{if $evento->getTipo() eq 'EEvento_p'}
                    <div class="mx-auto">prezzo : {$evento->getPrezzo()} </div></li>
                <li class="list-group-item"><div class="mx-auto">
                        <form action="/Never_home/Evento/FormAcquisto" enctype="multipart/form-data" method="post">
                            <button  type="submit" class="btn btn-outline-primary" name="evento" value="{$evento->getId()}">Acquista biglietto</button>
                        </form>
                    </div>


                    {else}
                    <div class="mx-auto">evento gratuito </div></li>
                {/if}

           </ul>

        </div>
</div>
<div class="container">


            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h7 class="badge  text-white">Inserisci commento:</h7>
                        <form method="post" action="/Never_home/Evento/newcommento/{$evento->getId()}/{$evento->getF()}" enctype="multipart/form-data">
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="commento" id="form30" rows="3" placeholder="Scrivi qui.. " required></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark my-2 text-primary border-primary">Invia</button>
                        </form>
                    </div>
                </div>
            </div>


</div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body text-dark">
                    <br>
                    <ul class="media-list">
                        {section name=commento loop=$commenti}
                            <li class="media py-2 text-light">
                                <div class="media-body px-2">
                                    <strong class="text-primary"><b>{$utenti[commento]->getUsername()}</b></strong>
                                {if $commenti[commento]->getBannato()==1}
                                    <p> il commento è stato bannato  </p>
                                </div>
                                {else}
                                    <p> {$commenti[commento]->getTesto()}  </p>
                                </div>
                                {/if}
                            </li>
                        {/section}
                    </ul>
                {if $pieno==false}
                <a class="btn btn-dark text-primary border-primary" href="/Never_home/Evento/HomeEvento/{$evento->getId()}/{$evento->getF()}/{$num+1}" role="button">Carica altri commenti</a>
                {else}
                {/if}
                <br>
                <br>


                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>