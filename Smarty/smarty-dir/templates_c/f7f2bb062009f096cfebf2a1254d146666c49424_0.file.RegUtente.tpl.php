<?php
/* Smarty version 3.1.33, created on 2019-10-01 15:44:45
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\RegUtente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d93584d000bf0_16764660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7f2bb062009f096cfebf2a1254d146666c49424' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\RegUtente.tpl',
      1 => 1569937480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d93584d000bf0_16764660 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/Never_home">NH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Account <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">notifiche</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-light" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container">
    <br><br>
        <form action="/Never_home/Utente/Registrazione" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" name="nome" class="form-control"  placeholder="Nome">
                </div>

                <div class="col-md-6">
                    <label for="inputPassword3">Cognome</label>
                    <input type="text" class="form-control" name="cognome"  placeholder="Cognome">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="inputAddress">Username</label>
                    <input type="text" name="user" class="form-control"  placeholder="Username">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress">Password</label>
                    <input type="password" name="psw" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="inputAddress2">email</label>
                    <input type="email" name="mail" class="form-control"  placeholder="Email">
                </div>
            <div class="col-md-6">
                <label for="inputPassword3">Codice Fiscale</label>
                <input type="text" class="form-control" name="cf"  placeholder="Codice Fiscale">
            </div>
            </div>
            <br>
            <div class="row my-5">
                <div class="mx-auto">
                    <button type="submit" class="btn btn-dark" >Registrati</button>
                </div>
            </div
        </form>
</div>


    <div class="fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center d-md-flex justify-content-between align-items-center">
                    <ul class="nav d-flex justify-content-center">
                        <li class="nav-item"> <a class="nav-link active" href="#">Home</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">Features</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">Pricing</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">About</a> </li>
                    </ul>
                    <p class="mb-0 py-1">© 2014-2018 Pingendo. All rights reserved</p>
                </div>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
