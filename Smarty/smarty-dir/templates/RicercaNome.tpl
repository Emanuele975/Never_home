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

{if $utente eq null }
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/Never_home">
            <img class="navbar-brand "  src="/Never_home/images/logo%20never%20home.png" style="width: 70px;height: 60px;" >
        </a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
                <input class="form-control mr-sm-2 "  type="search" placeholder="Search" aria-label="Search" name="nomericerca">
                <button class="btn btn-primary"   type="submit">Search</button>
            </form>
        </div>
    </nav>
{elseif $utente eq  "utente"}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/Never_home">
            <img class="navbar-brand "  src="/Never_home/images/logo%20never%20home.png" style="width: 70px;height: 60px;" >
        </a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Utente/Login" role="button">Account</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>
{elseif $utente eq "luogo"}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/Never_home">
            <img class="navbar-brand "  src="/Never_home/images/logo%20never%20home.png" style="width: 70px;height: 60px;" >
        </a>

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
{else}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/Never_home">
            <img class="navbar-brand "  src="/Never_home/images/logo%20never%20home.png" style="width: 70px;height: 60px;" >
        </a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               
                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Amministratore/Login/1" role="button">Account</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>
{/if}


<div class="list-group">
    {if $eventi eq null}
    <div class="py-5 text-center " style="background-size:cover;">
        <p class=" text-primary font-weight-bold" style="font-size: 30px" >
           NESSUN RISULTATO
        </p>
        <a class="btn btn-outline-primary" href="/Never_Home" role="button">RIPROVARE<br></a>
        {else}
        {section name=evento loop=$eventi}
            <a href="/Never_home/Evento/HomeEvento/{$eventi[evento]->getId()}/{$eventi[evento]->getF()}/1" class="list-group-item list-group-item-action  ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 text-primary">{$eventi[evento]->getNome()}</h5>
                    <small>{$eventi[evento]->getData()->format('d-m-Y')}</small>
                </div>
                <p class="mb-1">{$eventi[evento]->getDescrizione()}</p>
                <small>Clicca per visualizzare</small>
            </a>
        {/section}
    </div>
</div>
    {/if}
    <!--{section name=evento loop=$eventi}
        <a href="/Never_home/Evento/HomeEvento/{$eventi[evento]->getId()}/{$eventi[evento]->getF()}/1" class="list-group-item list-group-item-action  ">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1 text-primary">{$eventi[evento]->getNome()}</h5>
            <small>{$eventi[evento]->getData()->format('d-m-Y')}</small>
        </div>
        <p class="mb-1">{$eventi[evento]->getDescrizione()}</p>
        <small>Clicca per visualizzare</small>
    </a>
    {/section}-->
<!--</div>
</div>-->

</body>

</html>
