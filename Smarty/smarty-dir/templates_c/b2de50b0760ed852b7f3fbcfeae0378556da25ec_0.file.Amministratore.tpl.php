<?php
/* Smarty version 3.1.33, created on 2019-12-22 16:38:44
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\Amministratore.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dff8e049ebee3_83521110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2de50b0760ed852b7f3fbcfeae0378556da25ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\Amministratore.tpl',
      1 => 1576839265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dff8e049ebee3_83521110 (Smarty_Internal_Template $_smarty_tpl) {
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
        <a class="nav-link btn btn-dark btn-outline-primary mx-2 text-primary" href="#">Notifiche </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link btn btn-dark btn-outline-primary mx-2 text-primary" href="/Never_home/Amministratore/Logout">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="py-5 text-left" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel-body text-dark">
          <br>
          <ul class="media-list">
            <?php
$__section_commento_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['commenti']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_commento_0_total = $__section_commento_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_commento'] = new Smarty_Variable(array());
if ($__section_commento_0_total !== 0) {
for ($__section_commento_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] = 0; $__section_commento_0_iteration <= $__section_commento_0_total; $__section_commento_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']++){
?>
              <li class="media py-2">
                <div class="media-body px-2">
                  <strong class="text-secondary"><b><?php echo $_smarty_tpl->tpl_vars['utenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getUsername();?>
</b></strong>
                <?php if ($_smarty_tpl->tpl_vars['commenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getBannato() == 1) {?>
                  <p> il commento è stato bannato  </p>
                </div>
                <form method="post" enctype="multipart/form-data" action="/Never_home/Amministratore/sbloccacommento/<?php echo $_smarty_tpl->tpl_vars['commenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
                  <button class="btn btn-dark my-2" type="submit" > sblocca </button>
                </form>
                <?php } else { ?>
                  <p> <?php echo $_smarty_tpl->tpl_vars['commenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getTesto();?>
  </p>
                </div>
                <form method="post" enctype="multipart/form-data" action="/Never_home/Amministratore/bannacommento/<?php echo $_smarty_tpl->tpl_vars['commenti']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_commento']->value['index'] : null)]->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
  ">
                  <button class="btn btn-dark my-2" type="submit" > banna </button>
                </form>
                <?php }?>
              </li>
            <?php
}
}
?>
          </ul>
        <?php if ($_smarty_tpl->tpl_vars['pieno']->value == false) {?>
        <form method="post" enctype="multipart/form-data" action="/Never_home/Amministratore/Home/<?php echo $_smarty_tpl->tpl_vars['num']->value+1;?>
">
          <button class="btn btn-dark" type="submit">Carica altri commenti<br></button>
        </form>
        <?php } else { ?>
        <?php }?>
        </div>
      </div>
    </div>
  </div>

  <br><br><br><br>



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
