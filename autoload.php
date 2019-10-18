<?php

// questa vecchia versione di __autoload() va in conflitto
// con l'autoloader di smarty
//
//     function __autoload($className) {
//         include( "classi/$className" . ".class.php" );
//


function my_autoloader($className) {
    include_once( 'Entity/'. $className . '.php' );
}

spl_autoload_register('my_autoloader');



function my_autoloader2($className) {
    include_once ('Foundation/'. $className . '.php' );
}

spl_autoload_register('my_autoloader2');



?>