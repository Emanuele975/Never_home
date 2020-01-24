<?php
include_once 'Smarty/smarty-libs/libs/Smarty.class.php';

class confSmarty{
    static function configuration(){
        $smarty=new Smarty();
        $GLOBALS["ROOT"]=dirname(__FILE__);
        $smarty->setTemplateDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates');
        $smarty->setCompileDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates_c');
        $smarty->setCacheDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/cache');
        $smarty->setConfigDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/configs');
        return $smarty;
    }
}
