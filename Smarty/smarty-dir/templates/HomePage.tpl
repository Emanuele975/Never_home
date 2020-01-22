<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="\Never_home\Smarty\smarty-dir\templates\css\wireframe.css?ts=<?=time()?>&quot" type="text/css">
</head>

<body>
{if $utente eq null }
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-primary" href="/Never_home">NH</a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li>
                <div class="btn-group btn-dark" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn  btn-outline-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registrazione
                    </button>
                    <div class=" dark dropdown-menu " aria-labelledby="btnGroupDrop1">
                        <a class=" dropdown-item " href="/Never_home/Utente/FormRegistrazione">Registrazione utente</a>
                        <a class=" dropdown-item" href="/Never_home/Luogo/FormRegistrazione">Registrazione locale</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn  btn-outline-primary mx-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </button>
                    <div class="dark dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dark dropdown-item" href="/Never_home/Utente/Login">Login utente</a>
                        <a class="dark dropdown-item" href="/Never_home/Luogo/Login">Login locale</a>
                        <a class="dark dropdown-item" href="/Never_home/Amministratore/Login/1">Login Amministratore</a>

                    </div>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
            <input class="form-control mr-sm-2 "  type="search" placeholder="Search" aria-label="Search" name="nomericerca">
            <button class="btn btn-primary"   type="submit">Search</button>
        </form>
    </div>
</nav>
{elseif $utente eq  "utente"}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="/Never_home">NH</a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Utente/Login" role="button">Account</a>
                </li>
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
{elseif $utente eq "luogo"}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="/Never_home">NH</a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Luogo/Login" role="button">Account</a>
                </li>
                <li class="nav-item active">
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Luogo/Logout">Logout <span class="sr-only">(current)</span></a>
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
        <a class="navbar-brand text-primary" href="/Never_home">NH</a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Amministratore/Login/1" role="button">Account</a>
                </li>
                <li class="nav-item active">
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Amministratore/Logout">Logout <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>
{/if}


<div class="py-5 text-center " style="background-size:cover;">
    <div class="text-primary badge-dark"   ><h1><strong>  Trova il tuo evento  </strong></h1></div>



<div class="container">
        <div class="row">
            <br>
        </div>
        <div class="row mx-md-n5">

            <div class="col-12 col-lg-4">
                {if $evento1 eq null}
                <!--start card-->
                <div class="card text-white bg-dark mb-3">
                    <img class="card-img-top" src="" style="" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title">Evento non trovato</h4>
                        <p class="card-text"></p>
                        <a href="" class="btn btn-primary">Vai all evento</a>
                    </div>
                </div>
                {else}
                <div class="card text-white bg-dark mb-3">
                        {$img_1 = base64_encode($img1->getData())}
                        <img class="card-img-top" src="data:{$img1->getType()};base64,{$img_1}" style="height: 300px" alt="Card image cap" >
                        <div class="card-body">
                            <h4 class="card-title">{$evento1->getNome()}</h4>
                            <p class="card-text">{$evento1->getDescrizione()}</p>
                            <a href="/Never_home/Evento/HomeEvento/{$evento1->getId()}/{$evento1->getF()}/1" class="btn btn-primary">Vai all evento</a>
                        </div>
                    </div>
                {/if}
            </div>

            <div class="col-12 col-lg-4">
            {if $evento2 eq null}
            <!--start card-->
            <div class="card text-white bg-dark mb-3">

                <img class="card-img-top" src="" style="" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title">Evento non trovato</h4>
                    <p class="card-text"></p>
                    <a href="" class="btn btn-primary">Vai all evento</a>
                </div>
            </div>
            {else}
                <div class="card text-white bg-dark mb-3">
                    {$img_2 = base64_encode($img2->getData())}
                    <img class="card-img-top" src="data:{$img2->getType()};base64,{$img_2}" style="height: 300px" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title">{$evento2->getNome()}</h4>
                        <p class="card-text">{$evento2->getDescrizione()}</p>
                        <a href="/Never_home/Evento/HomeEvento/{$evento2->getId()}/{$evento2->getF()}/1" class="btn btn-primary">Vai all evento</a>
                    </div>
                </div>
            {/if}

            </div>

            <div class="col-12 col-lg-4">
            {if $evento3 eq null}
            <!--start card-->
            <div class="card text-white bg-dark mb-3">
                <img class="card-img-top" src="" style="" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title">Evento non trovato</h4>
                    <p class="card-text"></p>
                    <a href="" class="btn btn-primary">Vai all evento</a>
                </div>
            </div>
            {else}
                <div class="card text-white bg-dark mb-3">
                    {$img_3 = base64_encode($img3->getData())}
                    <img class="card-img-top" src="data:{$img3->getType()};base64,{$img_3}" style="height: 300px" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title">{$evento3->getNome()}</h4>
                        <p class="card-text">{$evento3->getDescrizione()}</p>
                        <a href="/Never_home/Evento/HomeEvento/{$evento3->getId()}/{$evento3->getF()}/1" class="btn btn-primary">Vai all evento</a>
                    </div>
                </div>
            {/if}
        </div>

        </div>
</div>

</div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>