<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">-->
    <link rel="stylesheet" href="\Never_home\Smarty\smarty-dir\templates\css\wireframe.css?ts=<?=time()?>&quot" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand text-primary" href="/Never_home">NH</a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Luogo/Login" role="button">Account</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>


{if $eventi eq null}

    <div class="py-5">
        <div class="container">
            <div class="row" style="">
                <div class="px-5 col-md-8 text-center mx-auto">
                    <h1 class="text-primary "> NON HAI ANCORA CREATO EVENTI</h1>
                    <a class="btn btn-outline-primary" href="/Never_home/Luogo/Login" role="button">Torna al profilo<br></a>

                </div>
            </div>

        </div>
    </div>




    {else}
<div class="list-group">
    {section name=evento loop=$eventi}
        <a href="/Never_home/Evento/HomeEvento/{$eventi[evento]->getId()}/{$eventi[evento]->getF()}/1" class="list-group-item list-group-item-action  ">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1 text-primary">{$eventi[evento]->getNome()}</h5>
            <small>{$eventi[evento]->getData()->format('d-m-Y')}</small>
        </div>
            {$eventi[evento]->getF()}
            {if $eventi[evento]->getF() eq "FEvento_p"}
                <p class="mb-1">Posti disponibili :{$eventi[evento]->getPosti_totali()}</p>
                <p class="mb-1">Posti disponibili :{$eventi[evento]->getPosti_disponibili()}</p>
            {else}
                <p class="mb-1">Evento gratuito</p>

            {/if}
        </a>
    {/section}
</div>
    {/if}
</body>

</html>
<!-- /Never_home/Evento/HomeEvento/{$eventi[evento]->getId()}/{$eventi[evento]->getF()}/1     DA METTERE DENTRO HREF-->
