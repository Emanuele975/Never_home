<?php
/* Smarty version 3.1.33, created on 2019-10-11 17:27:16
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\FormAcquisto1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da09f5466a955_30820402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c87daa317ff4edf38d4c76f210cc33cf1f1ead57' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\FormAcquisto1.tpl',
      1 => 1570807634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da09f5466a955_30820402 (Smarty_Internal_Template $_smarty_tpl) {
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link btn btn-dark btn-outline-primary mx-2 text-primary" href="#">Account <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link btn btn-dark btn-outline-primary mx-2 text-primary" href="#">notifiche</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container">
    <br><br>
    <form action="/Never_home/Evento/FormPagamento" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm">
            <div class="card mb-3" style="">
                <?php $_smarty_tpl->_assignInScope('img2', base64_encode($_smarty_tpl->tpl_vars['img']->value->getData()));?>
                <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['img']->value->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['img2']->value;?>
" style="width: 550px;	height: 300px;">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="row my-4">
                <div class="mx-auto"> Posti disponibili:<?php echo $_smarty_tpl->tpl_vars['evento']->value->getPosti_disponibili();?>
  </div>
            </div>
            <div class="row my-4">
                <div class="mx-auto"> Prezzo biglietto:<?php echo $_smarty_tpl->tpl_vars['evento']->value->getPrezzo();?>
  </div>
            </div>
            <div class="row my-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text " for="inputGroupSelect01">Quantità</label>
                    </div>
                    <select class="custom-select " id="inputGroupSelect01" name="num">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="row my-4">
                <div class="mx-auto">
                    <button type="submit" class="btn btn-dark" name="id_evento" value=<?php echo $_smarty_tpl->tpl_vars['evento']->value->getId();?>
>
                        Effettua prenotazione
                    </button>
                </div>
            </div>
        </div>
    </div>
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
