<?php

class CGestioneEvento
{

    /**
     * @param $tipo
     *
     */
    public function FormEvento($tipo)
    {
        $view = new Vlocale();
        $view->mostraformevento($tipo);
    }

    /**
     * @param $id
     * @param $classe
     * @param $num
     */
    public function HomeEvento($id,$classe,$num)
    {
        $pm = FPersistenceManager::getInstance();
        $evento = $pm->Load($id,$classe);
        if($evento!=null)
        {
            $immagine = $pm->getImgByidEvento($evento->getId(),$evento->getTipo());
            $commenti = $pm->caricacommenti($evento->getId(),$num);
            if ($commenti==null)
                $pieno=true;
            else
                $pieno = $commenti["pieno"];
            unset($commenti['pieno']);
            $utenti = array();
            if (isset($commenti))
            {
                foreach ($commenti as $i)
                {
                    $utente = $pm->Load($i->getUtente()->getId(),'FUtente_R');
                    array_push($utenti, $utente);
                }
            }
        } else
        {
            $msg = "non esiste questo evento";
            $path="/Never_home/Utente/Entra";
            $view2 = new VError();
            $view2->mostraErrore($msg,$path);
        }
        $sessione = Session::getInstance();
        if($sessione->isLoggedUtente())
            $tipo = "utente";
        else if ($sessione->isLoggedLuogo())
            $tipo = "luogo";
        else if ($sessione->isLoggedAdmin())
            $tipo = "admin";
        else
            $tipo = null;
        $view = new VEvento();
        $view->Home($evento,$immagine,$commenti,$utenti,$num,$pieno,$tipo);
    }

    public function NuovoEventoGratis($tipo){
        $view = new VNuovoEventoGratis();
        $dati = $view->recuperaDatiEvento();
        $pm = FPersistenceManager::getInstance();
        if ($dati['errore']!=null)
        {
            $view = new VError();
            $path="/Never_home/Evento/FormEvento/$tipo";
            $view->mostraErrore($dati['errore'],$path);
        }
        elseif ($pm->esisteevento($dati['NomeE'],new DateTime($dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno']),'FEvento_g'))
        {
            $view = new VError();
            $path="/Never_home/Evento/FormEvento/$tipo";
            $view->mostraErrore("esiste già un evento con questo nome",$path);
        }
        else {
            $sessione = Session::getInstance();
            $luogo=$sessione->getLuogo();
            $data = $dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno'];
            $data = new DateTime($data);
            $categoria = $pm->Loadcat($dati['Categoria']);
            $evento = new EEvento_g($dati['NomeE'],$data,$luogo,$categoria,$dati['descrizione']);
            $id = $pm->store($evento);
            $evento->setId($id);
            $img = new EImmagine($dati['img'], $dati['tipo'], $id, 'EEvento_g');
            $pm->store($img);
            $view = new Vlocale();
            $view->HomeLocale($evento, $img, $evento->getNome());
        }
    }

    public function NuovoEventoPagamento($tipo)
    {
        $view = new VNuovoEventoPagamento();
        $dati = $view->recuperaDatiEvento();
        $pm = FPersistenceManager::getInstance();
        if ($dati['errore']!=null)
        {
            $view = new VError();
            $path="/Never_home/Evento/FormEvento/$tipo";
            $view->mostraErrore($dati['errore'],$path);
        }
        elseif ($pm->esisteevento($dati['NomeE'],new DateTime($dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno']),'FEvento_p'))
        {
            $view = new VError();
            $path="/Never_home/Evento/FormEvento/$tipo";
            $view->mostraErrore("esiste già un evento con questo nome",$path);
        }
        else
        {
            $sessione = Session::getInstance();
            $luogo=$sessione->getLuogo();
            $data = $dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno'];
            $data = new DateTime($data);
            $categoria = $pm->Loadcat($dati['Categoria']);
            $prezzo = $dati["Prezzo"];
            $posti = $dati["Posti"];
            $evento = new EEvento_p($dati['NomeE'],$data,$luogo,$categoria,$dati['descrizione'],$prezzo,$posti,$posti);
            $id = $pm->store($evento);
            $evento->setId($id);
            $img = new EImmagine($dati['img'], $dati['tipo'], $id, 'EEvento_p');
            $pm->store($img);
            $view = new Vlocale();
            $view->HomeLocale($evento, $img);
        }
    }

    public function CercadaNome()
    {
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $view = new VRicerca();
            $nome = $view->getNomericerca(); //nome inserito nella barra di ricerca
            $pm = FPersistenceManager::getInstance();
            $eventi = $pm->EventoByNav($nome);
            //echo $eventi[0]->getCategoria();
            $sessione= Session::getInstance();
            if($sessione->isLoggedUtente())
                $view->mostraRisultati($eventi,"utente");
            else if ($sessione->isLoggedLuogo())
                $view->mostraRisultati($eventi,"luogo");
            else if ($sessione->isLoggedAdmin())
                $view->mostraRisultati($eventi,"admin");
            else
            {
                $view->mostraRisultati($eventi,null);
            }

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }

    public function CercadaNomeGratis($nome)
    {
        $pm = FPersistenceManager::getInstance();
        $eventi = $pm->EventiForAdmin($nome);
        return $eventi;
    }

    public function FormAcquisto()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedUtente())
        {
            $view = new VAcquisto();
            $id = $_POST['evento'];
            $pm = FPersistenceManager::getInstance();
            $evento = $pm->Load($id,'FEvento_p');
            $immagine = $pm->getImgByidEvento($evento->getId(),$evento->getTipo());
            $view->FormAcquisto($evento,$immagine);
        }
        else
        {
            $msg = "Utente non loggato";
            $path="/Never_home/Utente/Login";
            $view2 = new VError();
            $view2->mostraErrore($msg,$path);
        }
    }

    public function FormPagamento()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedUtente())
        {
            $view = new VAcquisto();
            $pm = FPersistenceManager::getInstance();
            $evento = $pm->Load($_POST['id_evento'],'FEvento_p');
            if($evento->getPosti_disponibili() >= $_POST['num'] && $_POST['num']!="Choose...")
            {
                $sessione->prenotaposti($_POST['num']);
                $pm->decrementaposti($_POST['id_evento'],$_POST['num']);
                $prezzo = $evento->getPrezzo();
                $prezzotot = $prezzo*$_POST['num'];
                $sessione = Session::getInstance();
                $sessione->setInfoVendita($prezzo,$_POST['num']);
                $view->FormPagamento($prezzotot,$_POST['id_evento']);
            }
            else
            {
                $evento = $_POST['id_evento'];
                $msg = "scegli un numero di posti";
                $view2 = new VError();
                $path="/Never_home/Evento/HomeEvento/$evento/FEvento_p/1";
                $view2->mostraErrore($msg,$path);
            }
        }
        else
        {
            $msg = "Utente non loggato";
            $view2 = new VError();
            $path="/Never_home";
            $view2->mostraErrore($msg,$path);
        }
    }

    public function Acquisto($id_evento)
    {
        $view = new VAcquisto();
        $dati = $view->getDati();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $info = $sessione->getInfoVendita();
        $utente = $sessione->getUtente();
        $prezzo = $info['prezzo']*$info['quantita'];
        if ($dati['errore']==null)
        {
            $id = $pm->CartaValida($dati['cf'],$dati['ccv'],new DateTime($dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno']),
                $dati['numero']);
            if ($id!=null)
            {
                $evento = $pm->Load($id_evento,'FEvento_p');
                $carta = $pm->Load($id,'FCarta');
                $acquisto = new EAcquisto(new DateTime('NOW'),$prezzo,$carta,$utente);
                $id_a = $pm->store($acquisto);
                $acquistobis = $pm->Load($id_a,'FAcquisto');
                $biglietto = new EBiglietto($prezzo,$evento,$acquistobis,$utente);
                $pm->store($biglietto);
                $msg = "acquisto effettuato con successo";
                $sessione->prenotaposti(0);
                $view->AcquistoEffettuato($msg);
            }
            else
            {
                $pm->incrementaposti($id_evento,$sessione->getposti());
                $msg2 = "si sono verificati problemi nell acquisto";
                $view2 = new VError();
                $path="/Never_home";
                $sessione->prenotaposti(0);
                $view2->mostraErrore($msg2,$path);
            }
        }
        else
        {
            $view2 = new VError();
            $path="/Never_home";
            $view2->mostraErrore($dati['errore'],$path);
        }

    }

    public function newcommento($id,$classe)
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedUtente())
        {
            $pm = FPersistenceManager::getInstance();
            $view = new VEvento();
            $testo = $view->getCommento();
            $evento = $pm->Load($id,$classe);
            $commento = new ECommento($testo['commento'],$sessione->getUtente(),$evento);
            $pm->store($commento);
            $this->HomeEvento($id,$classe,1);
        }
        else
        {
            $view2 = new VError();
            $path="/Never_home";
            $view2->mostraErrore("utente non loggato",$path);
        }
    }

    public function EliminaEvento($id)
    {
        $pm = FPersistenceManager::getInstance();
        $pm->delete($id,"FEvento_g");
    }

    public function prossimieventipagamento()
    {
        $pm = FPersistenceManager::getInstance();
        $eventi = $pm->prossimieventipagamento();
        return $eventi;
    }

    public function prossimieventigratuiti()
    {
        $pm = FPersistenceManager::getInstance();
        $eventi = $pm->prossimieventigratuiti();
        return $eventi;
    }

}