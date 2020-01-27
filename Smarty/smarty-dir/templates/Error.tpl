<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">-->
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
        <ul class="navbar-nav mr-auto">

        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</nav>
{if $path==null}<div class="py-5">
    <div class="container">
        <div class="row" style="">
            <div class="px-5 col-md-8 text-center mx-auto">
                <h3 class="text-primary display-1"> <b>ERRORE!</b></h3>
                <h3 class="text-primary display-5">{$msg}<br></h3>
                <h3 class="btn-outline-primary display-5">RIPROVARE<br></h3>
            </div>
        </div>
    </div>
    </div>
{else}
<div class="py-5">
    <div class="container">
        <div class="row" style="">
            <div class="px-5 col-md-8 text-center mx-auto">
                <h3 class="text-primary display-1"> <b>ERRORE!</b></h3>
                <h3 class="text-primary display-5">{$msg}<br></h3>
                <a class="btn btn-outline-primary" href="{$path}" role="button">RIPROVARE<br></a>
                </div>
        </div>

    </div>


</div>
{/if}



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>