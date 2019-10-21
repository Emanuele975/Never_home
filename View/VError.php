<?php


class VError
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/configs');
    }

    public function mostraErrore($msg,$path)
    {
        if ($path==null){
            $this->smarty->assign('path',null);
        }
        else{
            $this->smarty->assign('path',$path);
        }
        $this->smarty->assign("msg",$msg);
        $this->smarty->display("Error.tpl");
    }

}