<?php
include_once 'Smarty/smarty-libs/libs/Smarty.class.php';

class confSmarty{
    static function configuration(){
        $smarty=new Smarty();
        $smarty->setTemplateDir('Smarty/smarty-dir/templates');
        $smarty->setCompileDir('Smarty/smarty-dir/templates_c');
        $smarty->setCacheDir('Smarty/smarty-dir/cache');
        $smarty->setConfigDir('Smarty/smarty-dir/configs');
        return $smarty;
    }
}
