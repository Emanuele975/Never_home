<?php
/* Smarty version 3.1.33, created on 2019-10-07 17:24:01
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\HomePage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d9b589164a537_40418928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f996b25c298261bd659e18962667e41810aca5c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\HomePage.tpl',
      1 => 1570461838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d9b589164a537_40418928 (Smarty_Internal_Template $_smarty_tpl) {
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

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li>
                <div class="btn-group btn-dark" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registrazione
                    </button>
                    <div class="dark dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class=" dropdown-item" href="/Never_home/Utente/FormRegistrazione">Registrazione utente</a>
                        <a class=" dropdown-item" href="/Never_home/Luogo/FormRegistrazione">Registrazione locale</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <button class="btn btn-light" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="py-5 text-center" style="background-image: url('https://images.pexels.com/photos/1587927/pexels-photo-1587927.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260');background-size:cover;">
    <div class="container">
        <div class="row">
            <br>
        </div>
        <div class="row mx-md-n5">
            <div class="col-12 col-lg-4">
                <!--start card-->
                <div class="card-wrapper">
                    <div class="card card-img no-after">
                        <div class="img-responsive-wrapper">
                            <div class="img-responsive">
                                <figure class="img-wrapper">
                                    <?php $_smarty_tpl->_assignInScope('img_1', base64_encode($_smarty_tpl->tpl_vars['img1']->value->getData()));?>
                                    <img src="data:<?php echo $_smarty_tpl->tpl_vars['img1']->value->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['img_1']->value;?>
" title="img title" alt="imagealt">
                                </figure>
                                <div class="card-calendar d-flex flex-column justify-content-center">
                                    <span class="card-date"><?php echo $_smarty_tpl->tpl_vars['evento1']->value->getData()->format('Y-m-d');?>
 </span>
                                    <!-- <span class="card-day">dicembre</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['evento1']->value->getDescrizione();?>
</h5>
                            <p class="card-text"></p><a class="read-more" href="#"><span class="text">Leggi di più</span>
                                <svg class="icon">
                                    <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-arrow-right"></use>
                                </svg></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-4">
                <!--start card-->
                <div class="card-wrapper">
                    <div class="card card-img no-after">
                        <div class="img-responsive-wrapper">
                            <div class="img-responsive">
                                <figure class="img-wrapper">
                                    <img src="https://via.placeholder.com/310x190/0066cc/FFFFFF/?text=IMMAGINE%20DI%20ESEMPIO" title="img title" alt="imagealt">
                                </figure>
                                <div class="card-calendar d-flex flex-column justify-content-center">
                                    <span class="card-date"><?php echo $_smarty_tpl->tpl_vars['evento2']->value->getData()->format('Y-m-d');?>
 </span>
                                    <!--<span class="card-day">dicembre</span>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['evento2']->value->getDescrizione();?>
</h5>
                            <p class="card-text"></p><a class="read-more" href="#"><span class="text">Leggi di più</span>
                                <svg class="icon">
                                    <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-arrow-right"></use>
                                </svg></a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12 col-lg-4">
                <!--start card-->
                <div class="card-wrapper">
                    <div class="card card-img no-after">
                        <div class="img-responsive-wrapper">
                            <div class="img-responsive">
                                <figure class="img-wrapper">
                                    <img src="https://via.placeholder.com/310x190/0066cc/FFFFFF/?text=IMMAGINE%20DI%20ESEMPIO" title="img title" alt="imagealt">
                                </figure>
                                <div class="card-calendar d-flex flex-column justify-content-center">
                                    <span class="card-date">data evento </span>
                                    <!--<span class="card-day">dicembre</span>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Descrizione</h5>
                            <p class="card-text"></p><a class="read-more" href="#"><span class="text">Leggi di più</span>
                                <svg class="icon">
                                    <use xlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-arrow-right"></use>
                                </svg></a>
                        </div>
                    </div>
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
