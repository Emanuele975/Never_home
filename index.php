<?php
include_once "include.php";
if(Installation::VerifyInstallation()) {
    include_once 'config.inc.php';
    $fc = new CFrontController();
    $fc->run();
}
else
{
    Installation::begin();
}




?>
