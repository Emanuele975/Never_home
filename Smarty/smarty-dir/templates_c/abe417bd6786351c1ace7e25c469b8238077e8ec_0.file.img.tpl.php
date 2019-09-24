<?php
/* Smarty version 3.1.33, created on 2019-09-19 18:10:12
  from 'C:\xampp\htdocs\Never_home\Smarty\smarty-dir\templates\img.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d83a864547f91_01697844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abe417bd6786351c1ace7e25c469b8238077e8ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Never_home\\Smarty\\smarty-dir\\templates\\img.tpl',
      1 => 1568909408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d83a864547f91_01697844 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="container">
    <div class="row">
        <br>

        <br>
    </div>
    <div class="row">
        <div class="col-sm">
            <?php echo $_smarty_tpl->tpl_vars['img']->value->getType();?>

        </div>
        <div class="col-sm">
            <?php $_smarty_tpl->_assignInScope('image', base64_encode($_smarty_tpl->tpl_vars['img']->value->getType()));?>
            <img class="img-fluid d-block w-100 h-100" src="data:<?php echo $_smarty_tpl->tpl_vars['img']->value->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" style="width: 200px;	height: 200px;">
        </div>
    </div>
</div>
</body>
</html>
<?php }
}
