<?php
include_once "include.php";
if(Installation::VerifyInstallation()) {
    $fc = new CFrontController();
    $fc->run();
}
else
{
    Installation::begin();
}




?>
