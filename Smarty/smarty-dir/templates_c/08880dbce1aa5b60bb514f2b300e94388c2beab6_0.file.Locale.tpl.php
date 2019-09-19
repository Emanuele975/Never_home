<?php
/* Smarty version 3.1.33, created on 2019-09-17 19:40:25
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\Locale.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d811a89e4ec90_57927463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08880dbce1aa5b60bb514f2b300e94388c2beab6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\Locale.tpl',
      1 => 1568741838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d811a89e4ec90_57927463 (Smarty_Internal_Template $_smarty_tpl) {
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
        <a class="nav-link" href="#">Notifiche </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Never_home/Luogo/Logout">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-light" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container ">
  <div class="row">
    <br><br>
  </div>
  <div class="row mx-md-n5">
    <div class="col-sm-8">
      <form action="/Never_home/Evento/FormEvento" method="post">
      <button type="submit" class="btn btn-primary btn-lg btn-block" name="EventoG" value="G">Crea evento gratis</button>
      <button type="submit" class="btn btn-secondary btn-lg btn-block" name="EventoP" value="P">Crea evento a pagamento</button>
      </form>
    </div>
    <div class="col-sm-4">
      <div class="container">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" >nome evento: <?php echo $_smarty_tpl->tpl_vars['evento']->value->getNome();?>
</h5>
              <small>data evento : <?php echo $_smarty_tpl->tpl_vars['evento']->value->getData()->format('d-m-Y');?>
    </small>
            </div>
            <p class="mb-1">descrizione</p>
            <small>...</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between" >
              <h5 class="mb-1">nome evento: <?php echo $_smarty_tpl->tpl_vars['evento']->value->getNome();?>
</h5>
              <small class="text-muted">data evento : <?php echo $_smarty_tpl->tpl_vars['evento']->value->getData()->format('d-m-Y');?>
</small>
            </div>
            <p class="mb-1">descrizione </p>
            <?php $_smarty_tpl->_assignInScope('img', base64_encode($_smarty_tpl->tpl_vars['row']->value['data']));?>
            <img class="img-fluid d-block w-100 h-100" src="data:<?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
;base64,<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
" style="width: 200px;	height: 200px;">
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">nome evento: <?php echo $_smarty_tpl->tpl_vars['evento']->value->getNome();?>
</h5>
              <small class="text-muted">data evento : <?php echo $_smarty_tpl->tpl_vars['evento']->value->getData()->format('d-m-Y');?>
</small>
            </div>
            <p class="mb-1">descrizione</p>
            <small class="text-muted">...</small>
          </a>
        </div>
      </div>
    </div>
  </div>
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
