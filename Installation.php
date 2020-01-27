<?php

require_once 'include.php';

/**
 * Classe che si occupa dell'installazione dell'applicativo.
 * @package Utility
 */

class Installation{

    /**
     * Funzione che nella sostanza si occupa del controllo dei requisiti per l'installazione, ovvero:
     * - PHP versione 7.0 o superiore;
     * - cookie abilitati;
     * - javascript abilitato.
     */
    static function Begin(){
        $smarty=confSmarty::configuration();
        if($_SERVER['REQUEST_METHOD']=="GET"){ //alla richiesta della pagina
            setcookie('verifica_cookie', 'verifica',time()+3600);
            $smarty->assign("root",dirname(__FILE__));
            $smarty->display('InstallationForm.tpl'); //e si mostra il form di installazione
        }
        else{ //... ovvero method= POST
            $noPHP = false;
            $noCookie = false;
            $noJS = false;
            // controllo versione PHP
            if (version_compare(PHP_VERSION,'7.0.0' , '<' )) {
                $noPHP = true;
                $smarty->assign('nophpv', $noPHP);
            }
            // controllo cookie
            if (!isset($_COOKIE['verifica_cookie'])){
                $noCookie = true;
                $smarty->assign('nocookie', $noCookie);
            }
            // verifica JS
            if (!isset($_COOKIE['checkjs'])){
                $noJS = true;
                $smarty->assign('nojs', $noJS);
            }
            // se almeno uno dei controlli non è andato a buon fine, si mostra la pagina di installazione con i relativi errori.
            if ($noPHP || $noJS || $noCookie){
                $smarty->display('InstallationForm.tpl');
            }
            else{ // ... ovvero requisti verificati
                setcookie('checkjs','',time()-3600); //si eliminano i cookie
                setcookie('checkcoockie','',time()-3600);
                if(static::install()){ // si procede con l'installazione vera e propria
                    if($_POST['populate']=="yes") static::populate(); //se è stata selezionata la voce populate si popola il database.
                }
                header('Location: /Never_home');
            }
        }
    }

    /**
     * Funzione che provvede alla creazione del file config.inc.php per l'accesso al database e della creazione del database.
     */
    static function install(){
        try
        {
            $db = new PDO("mysql:host=localhost;", $_POST['nomeutente'], $_POST['password']);
            $db->beginTransaction();
            $query = 'DROP DATABASE IF EXISTS ' .$_POST['nomedb']. '; CREATE DATABASE ' . $_POST['nomedb'] . ' ; USE ' . $_POST['nomedb'] . ';' . 'SET GLOBAL max_allowed_packet=16777216;';
            $query = $query . file_get_contents('tables.sql');
            $db->exec($query);
            $db->commit();
            $file = fopen('config.inc.php', 'w');
            $script = '<?php $host= \'localhost\'; $GLOBALS[\'database\']= \'' . $_POST['nomedb'] . '\'; $GLOBALS[\'username\']= \'' . $_POST['nomeutente'] . '\'; $GLOBALS[\'password\']= \'' . $_POST['password'] . '\';
                ?>';
            fwrite($file, $script);
            fclose($file);
            $db=null;
            return true;
        }
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
            return false;
        }
    }

    //Funzione che si occupa del popolamento dell'applicazione
    static function populate(){
        try{
            $db = new PDO("mysql:host=localhost; dbname=".$_POST['nomedb'], $_POST['nomeutente'], $_POST['password']);
            $db->beginTransaction();
            $db->exec(file_get_contents('insert.sql'));
            $db->commit();
            $db=null;
        }
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
            return false;
        }
    }

// Funzione che verifica la presenza del cookie di installazione e quindi se quest'ultima è stata effettuata.
    static function VerifyInstallation(){
        if(file_exists('config.inc.php')) return true;
        else return false;
    }

}
