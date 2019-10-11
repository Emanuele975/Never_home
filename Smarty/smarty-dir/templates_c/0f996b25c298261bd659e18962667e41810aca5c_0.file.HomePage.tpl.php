<?php
<<<<<<< HEAD
/* Smarty version 3.1.33, created on 2019-10-09 12:51:21
=======
/* Smarty version 3.1.33, created on 2019-10-11 09:33:02
>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\HomePage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
<<<<<<< HEAD
  'unifunc' => 'content_5d9dbba9ac5250_51626984',
=======
  'unifunc' => 'content_5da0302e5894e2_62532171',
>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f996b25c298261bd659e18962667e41810aca5c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\HomePage.tpl',
<<<<<<< HEAD
      1 => 1570618280,
=======
      1 => 1570779180,
>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
<<<<<<< HEAD
function content_5d9dbba9ac5250_51626984 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5da0302e5894e2_62532171 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3
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
    <a class="navbar-brand text-primary" href="/Never_home">NH</a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li>
                <div class="btn-group btn-dark" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </button>
                    <div class="dark dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dark dropdown-item" href="/Never_home/Utente/Login">Login utente</a>
                        <a class="dark dropdown-item" href="/Never_home/Luogo/Login">Login locale</a>
                    </div>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</nav>
<<<<<<< HEAD
<div class="py-5 text-center " style="background-image: url('https://images.pexels.com/photos/1587927/pexels-photo-1587927.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260');background-size:cover;">
    <div class="badge badge-pill badge-dark text-primary"  ><h1><strong>Trova il tuo evento</strong></h1></div>
=======

<div class="py-5 text-center " style="background-image: url('https://images.pexels.com/photos/1587927/pexels-photo-1587927.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260');background-size:100% 100%;"><div class="badge badge-pill badge-dark text-wrap"  ><h1>Trova il tuo evento</h1></div>
>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3
    <div class="container">
        <div class="row">
            <br>
        </div>
        <div class="row mx-md-n5">
            <div class="col-12 col-lg-4">
                <!--start card-->
<<<<<<< HEAD
                <div class="card text-white bg-dark mb-3"> <img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> <a href="#" class="btn btn-primary">Go somewhere</a>
=======
                <div class="card text-white bg-dark mb-3">
                    <?php $_smarty_tpl->_assignInScope('img_1', base64_encode($_smarty_tpl->tpl_vars['img1']->value->getData()));?>
                    <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['img1']->value->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['img_1']->value;?>
" style="height: 300px" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $_smarty_tpl->tpl_vars['evento1']->value->getNome();?>
</h4>
                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['evento1']->value->getDescrizione();?>
</p>
                        <a href="/Never_home/Evento/HomeEvento/<?php echo $_smarty_tpl->tpl_vars['evento1']->value->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['evento1']->value->getF();?>
" class="btn btn-primary">Vai all evento</a>
>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3
                    </div>
                </div>

            </div>
<<<<<<< HEAD

=======
            <div class="col-12 col-lg-4">
            <!--start card-->
            <div class="card text-white bg-dark mb-3">
                <?php $_smarty_tpl->_assignInScope('img_2', base64_encode($_smarty_tpl->tpl_vars['img2']->value->getData()));?>
                <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['img2']->value->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['img_2']->value;?>
" style="height: 300px" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title"><?php echo $_smarty_tpl->tpl_vars['evento2']->value->getNome();?>
</h4>
                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['evento2']->value->getDescrizione();?>
</p>
                    <a href="/Never_home/Evento/HomeEvento/<?php echo $_smarty_tpl->tpl_vars['evento2']->value->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['evento2']->value->getF();?>
" class="btn btn-primary">Vai all evento</a>
                </div>
            </div>
>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3

        <div class="col-12 col-lg-4">
            <!--start card-->
            <div class="card text-white bg-dark mb-3"> <img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
<<<<<<< HEAD

        </div>
        <div class="col-12 col-lg-4">
            <!--start card-->
            <div class="card text-white bg-dark mb-3"> <img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    </div>


        <div class="fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center d-md-flex justify-content-between align-items-center" >
                        <ul class="nav d-flex justify-content-center">
                            <li class="nav-item"> <a class="nav-link active" href="#">Home</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">Features</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">Pricing</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">About</a> </li>
                        </ul>
                        <p class="mb-0 py-1" >© 2014-2018 Pingendo. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
=======
            <div class="col-12 col-lg-4">
            <!--start card-->
            <div class="card text-white bg-dark mb-3">
                <?php $_smarty_tpl->_assignInScope('img_3', base64_encode($_smarty_tpl->tpl_vars['img3']->value->getData()));?>
                <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['img3']->value->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['img_3']->value;?>
" style="height: 300px" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title"><?php echo $_smarty_tpl->tpl_vars['evento3']->value->getNome();?>
</h4>
                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['evento3']->value->getDescrizione();?>
</p>
                    <a href="/Never_home/Utente/caricabiglietti" class="btn btn-primary">Vai all evento</a>
                </div>
            </div>
            </div>
        </div>

>>>>>>> 1f377020d95fc3d6e35181da93b9b93481db76a3
    </div>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
