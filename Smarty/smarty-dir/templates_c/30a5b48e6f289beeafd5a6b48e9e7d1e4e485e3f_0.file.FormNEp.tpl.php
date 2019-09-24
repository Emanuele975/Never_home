<?php
/* Smarty version 3.1.33, created on 2019-09-23 17:33:55
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\FormNEp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d88e5e3e61314_61756157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30a5b48e6f289beeafd5a6b48e9e7d1e4e485e3f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\FormNEp.tpl',
      1 => 1569252809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d88e5e3e61314_61756157 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-light" type="submit">Search</button>
    </form>
  </div>
</nav>

<br><br>

<form action='/Never_home/Evento/NuovoEventoPagamento' method="post" enctype="multipart/form-data">

  <div class="container">

    <div class="row">
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Nome Evento</span>
          </div>
          <input type="text" name="NomeE" aria-label="First name" class="form-control">
        </div>
      </div>
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="Categoria">
            <option selected>Choose...</option>
            <option value="Teatro">Teatro</option>
            <option value="Concerto">Concerto</option>
            <option value="Partita">Partita</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md">
        <div class="input-group flex-nowrap">
          <div class="input-group-prepend">
            <span class="input-group-text">Data evento</span>
          </div>
          <input type="text" name="Giorno" class="form-control" placeholder="GG" aria-label="GG" aria-describedby="addon-wrapping">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping0">/</span>
          </div>
          <input type="text" class="form-control" name="Mese" placeholder="MM" aria-label="MM" aria-describedby="addon-wrapping">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping1">/</span>
          </div>
          <input type="text" class="form-control" name="Anno" placeholder="AAAA" aria-label="AAAA" aria-describedby="addon-wrapping">
        </div>
      </div>
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Prezzo</span>
          </div>
          <input type="text" name="Prezzo" aria-label="Prezzo" class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Posti disponibili</span>
          </div>
          <input type="text" name="Posti" aria-label="Posti disponibili" class="form-control">
        </div>
      </div>
      <div class="form-group col-md">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01"
                   aria-describedby="inputGroupFileAddon01" name="file_inviato">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Descrizione</span>
          </div>
          <textarea name="descrizione" class="form-control" aria-label="With textarea"></textarea>
        </div>
      </div>
    </div>

  </div>

  <div class="row my-5">
    <div class="mx-auto">
      <button type="submit" class="btn btn-dark" >Crea Evento</button>
    </div>
  </div>

</form>

<div class="btn-group" role="group">
  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown
  </button>
  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
    <a class="dropdown-item" href="#">Dropdown link</a>
    <a class="dropdown-item" href="#">Dropdown link</a>
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
