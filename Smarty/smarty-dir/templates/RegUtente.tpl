<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <!--<link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">-->
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
        <ul class="navbar-nav mr-auto"></ul>
        <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container">
    <br><br>
        <form action="/Never_home/Utente/Registrazione" method="post">
            <div class="row">
                <div class="col-md-6 text-primary">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" name="nome" class="form-control"  placeholder="Nome">
                </div>

                <div class="col-md-6 text-primary">
                    <label for="inputPassword3">Cognome</label>
                    <input type="text" class="form-control" name="cognome"  placeholder="Cognome">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 text-primary">
                    <label for="inputAddress">Username</label>
                    <input type="text" name="user" class="form-control text"  placeholder="Username">
                </div>
                <div class="col-md-6 text-primary">
                    <label for="inputAddress">Password</label>
                    <input type="password" name="psw" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-primary">
                    <label for="inputAddress2">email</label>
                    <input type="email" name="mail" class="form-control"  placeholder="Email">
                </div>
            <div class="col-md-6 text-primary">
                <label for="inputPassword3">Codice Fiscale</label>
                <input type="text" class="form-control" name="cf"  placeholder="Codice Fiscale">
            </div>
            </div>
            <br>
            <div class="row my-5">
                <div class="mx-auto">
                    <button type="submit" class="btn btn-dark text-primary" >Registrati</button>
                </div>
            </div
        </form>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>