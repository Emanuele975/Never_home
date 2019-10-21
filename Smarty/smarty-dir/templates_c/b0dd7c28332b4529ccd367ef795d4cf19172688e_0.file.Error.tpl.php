<?php
/* Smarty version 3.1.33, created on 2019-10-21 15:08:33
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\Error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dadadd1e10af2_43032386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0dd7c28332b4529ccd367ef795d4cf19172688e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\Error.tpl',
      1 => 1571663311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dadadd1e10af2_43032386 (Smarty_Internal_Template $_smarty_tpl) {
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

        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php if ($_smarty_tpl->tpl_vars['path']->value == null) {?><div class="py-5">
    <div class="container">
        <div class="row" style="">
            <div class="px-5 col-md-8 text-center mx-auto">
                <h3 class="text-primary display-1"> <b>ERRORE!</b></h3>
                <h3 class="text-primary display-5"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br></h3>
                <h3 class="text-primary display-5">RIPROVARE<br></h3>
            </div>
        </div>
    </div>
    </div>
<?php } else { ?>
<div class="py-5">
    <div class="container">
        <div class="row" style="">
            <div class="px-5 col-md-8 text-center mx-auto">
                <h3 class="text-primary display-1"> <b>ERRORE!</b></h3>
                <h3 class="text-primary display-5"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br></h3>
                <a class="btn btn-dark" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
" role="button">RIPROVARE<br></a>
                </div>
        </div>
       <!-- <a class="btn btn-dark" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
" role="button">Torna Indietro</a>-->
    </div>


</div>
<?php }?>

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
