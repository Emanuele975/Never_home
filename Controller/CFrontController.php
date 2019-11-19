<?php
/**
 * Class CFrontController si occupa di istanziare il giusto controllore e il relativo metodo basandosi sull'URL ricevuta
 * /myRecipes/web/controller/metodo/parametro
 */

class CFrontController
{
    /**
     * Metodo che dalla URL recupera il controllore da istanziare e il relativo metodo con eventuale parametro
     * Controllo come prima cosa se il client che fa la richiesta è web o mobile
     * /myRecipes/web/controller/metodo/param
     */
    public function run()
    {

        $path = $_SERVER['REQUEST_URI'];
        $array = explode('/', $path);

        array_shift($array);

        $count = count($array);

        if ($array[$count - 1] == null) {
            unset($array[$count - 1]);
        }
        if (count($array) != 1) {
            $controller = $array[1];
            $controller = "CGestione" . $controller;
            if (class_exists($controller)) {
                $metodo = $array[2];
                if (method_exists($controller, $metodo)) {
                    $c = new $controller();
                    if (isset($array[3])) {
                        $parametro = $array[3];
                        if (isset($array[4]))
                        {
                            $parametro2 = $array[4];
                            if (isset($array[5]))
                            {
                                $parametro3 = $array[5];
                                $c->$metodo($parametro,$parametro2,$parametro3);
                            }
                            else
                            {
                                $c->$metodo($parametro,$parametro2);
                            }
                        }
                        else
                            $c->$metodo($parametro);
                    } else {
                        $c->$metodo();
                    }
                } else {
                    header('HTTP/1.1 405 Method Not Allowed');
                    exit;
                }
            }else {
                $errore="Pagina non trovata";
                $view = new VError();
                $view->mostraErrore($errore);
            }
        } else { //richiesta per la Homepage
            $controller = new CGestioneHomepage();
            $controller->impostaPagina();
        }
    }

}

?>