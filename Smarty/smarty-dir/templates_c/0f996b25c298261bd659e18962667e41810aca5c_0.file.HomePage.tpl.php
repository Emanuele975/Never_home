<?php
/* Smarty version 3.1.33, created on 2019-10-14 17:47:21
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\HomePage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da49889558e11_42137134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f996b25c298261bd659e18962667e41810aca5c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\HomePage.tpl',
      1 => 1571067625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da49889558e11_42137134 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
<?php if ($_smarty_tpl->tpl_vars['utente']->value == null) {?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-primary" href="/Never_home">NH</a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li>
                <div class="btn-group btn-dark" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-outline-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-outline-primary mx-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<?php } elseif ($_smarty_tpl->tpl_vars['utente']->value == "utente") {?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="/Never_home">NH</a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li>
                    <div class="btn-group btn-dark" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-outline-primary  dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Registrazione
                        </button>
                        <div class=" dark dropdown-menu " aria-labelledby="btnGroupDrop1">
                            <a class=" dropdown-item " href="/Never_home/Utente/FormRegistrazione">Registrazione utente</a>
                            <a class=" dropdown-item" href="/Never_home/Luogo/FormRegistrazione">Registrazione locale</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Utente/Login" role="button">Account</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>
<?php } else { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="/Never_home">NH</a>

        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li>
                    <div class="btn-group btn-dark" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-outline-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Registrazione
                        </button>
                        <div class=" dark dropdown-menu " aria-labelledby="btnGroupDrop1">
                            <a class=" dropdown-item " href="/Never_home/Utente/FormRegistrazione">Registrazione utente</a>
                            <a class=" dropdown-item" href="/Never_home/Luogo/FormRegistrazione">Registrazione locale</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a class="btn btn-dark mx-2 btn-outline-primary" href="/Never_home/Luogo/Login" role="button">Account</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" enctype="multipart/form-data" action="/Never_home/Evento/CercadaNome">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nomericerca">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>

<?php }?>


<div class="py-5 text-center " style="background-image: url('https://images.pexels.com/photos/1587927/pexels-photo-1587927.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260');background-size:cover;">
    <div class="badge badge-pill badge-dark text-primary"  ><h1><strong>Trova il tuo evento</strong></h1></div>

<div class="container">
        <div class="row">
            <br>
        </div>
        <div class="row mx-md-n5">

            <div class="col-12 col-lg-4">
                <?php if ($_smarty_tpl->tpl_vars['evento1']->value == null) {?>
                <!--start card-->
                <div class="card text-white bg-dark mb-3">
                    <img class="card-img-top" src="" style="" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title">Evento non trovato</h4>
                        <p class="card-text"></p>
                        <a href="" class="btn btn-primary">Vai all evento</a>
                    </div>
                </div>
                <?php } else { ?>
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
                        </div>
                    </div>
                <?php }?>
            </div>

            <div class="col-12 col-lg-4">
            <?php if ($_smarty_tpl->tpl_vars['evento2']->value == null) {?>
            <!--start card-->
            <div class="card text-white bg-dark mb-3">

                <img class="card-img-top" src="" style="" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title">Evento non trovato</h4>
                    <p class="card-text"></p>
                    <a href="" class="btn btn-primary">Vai all evento</a>
                </div>
            </div>
            <?php } else { ?>
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
            <?php }?>

            </div>

            <div class="col-12 col-lg-4">
            <?php if ($_smarty_tpl->tpl_vars['evento3']->value == null) {?>
            <!--start card-->
            <div class="card text-white bg-dark mb-3">
                <img class="card-img-top" src="" style="" alt="Card image cap" >
                <div class="card-body">
                    <h4 class="card-title">Evento non trovato</h4>
                    <p class="card-text"></p>
                    <a href="" class="btn btn-primary">Vai all evento</a>
                </div>
            </div>
            <?php } else { ?>
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
            <?php }?>
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
