<?php


class CGestioneEvento
{
    public function FormEvento()
    {
        $view = new Vlocale();
        $view->mostraformevento();
    }

    public function HomeEvento($id,$classe)
    {
        $pm = FPersistenceManager::getInstance();
        $evento = $pm->Load($id,$classe);
        if($evento!=null)
        {
            $immagine = $pm->getImgByidEvento($evento->getId(),$evento->getTipo());
            $commenti = $pm->caricacommenti($evento->getId());
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
            $view2 = new VError();
            $view2->mostraErrore($msg);
        }
        $view = new VEvento();
        $view->Home($evento,$immagine,$commenti,$utenti);
    }

    public function NuovoEventoGratis(){
        $view = new VNuovoEventoGratis();
        $dati = $view->recuperaDatiEvento();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $luogo=$sessione->getLuogo();
        $data = $dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno'];
        $data = new DateTime($data);
        $categoria = $pm->Loadcat($dati['Categoria']);
        $evento = new EEvento_g($dati['NomeE'],$data,$luogo,$categoria,$dati['descrizione']);
        if ($pm->esisteevento($dati['NomeE'],'FEvento_g'))
        {
            $view = new VError();
            $view->mostraErrore("esiste già un evento con questo nome",null);
        }
        else {
            $id = $pm->store($evento);
            $evento->setId($id);
            $img = new EImmagine($dati['img'], $dati['tipo'], $id, 'EEvento_g');
            $pm->store($img);
            $view = new Vlocale();
            $view->HomeLocale($evento, $img);
        }
    }

    public function NuovoEventoPagamento()
    {
        $view = new VNuovoEventoPagamento();
        $dati = $view->recuperaDatiEvento();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $luogo=$sessione->getLuogo();
        $data = $dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno'];
        $data = new DateTime($data);
        $categoria = $pm->Loadcat($dati['Categoria']);
        $prezzo = $dati["Prezzo"];
        $posti = $dati["Posti"];
        $evento = new EEvento_p($dati['NomeE'],$data,$luogo,$categoria,$dati['descrizione'],$prezzo,$posti,$posti);
        if ($pm->esisteevento($dati['NomeE'],'FEvento_g'))
        {
            $id = $pm->store($evento);
            $evento->setId($id);
            $img = new EImmagine($dati['img'], $dati['tipo'], $id, 'EEvento_p');
            $pm->store($img);
            $view = new Vlocale();
            $view->HomeLocale($evento, $img);
        }
        else
        {}
    }

    public function CercadaNome()
    {
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $view = new VRicerca();
            $nome = $view->getNomericerca(); //nome inserito nella barra di ricerca
            $pm = FPersistenceManager::getInstance();
            $evento = $pm->EventoByNome($nome);
            if($evento!=null){
                $msg = "";
                $immagine = $pm->getImgByidEvento($evento->getId(),$evento->getTipo());
            } else {
                $msg = "Non esistono eventi con questo nome";
                $view2 = new VError();
                $view2->mostraErrore($msg);
            }

            $this->HomeEvento($evento->getId(),$evento->getF());

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
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
            $view2 = new VError();
            $view2->mostraErrore($msg);
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
            if($evento->getPosti_disponibili() >= $_POST['num'])
            {
                $sessione->prenotaposti($_POST['num']);
                $pm->decrementaposti($_POST['id_evento'],$_POST['num']);
                $prezzo = $evento->getPrezzo();
                $prezzotot = $prezzo*$_POST['num'];
                $sessione = Session::getInstance();
                $sessione->setInfoVendita($prezzo,$_POST['num']);
                $view->FormPagamento($prezzotot,$_POST['id_evento']);
            }
        }
        else
        {
            $msg = "Utente non loggato";
            $view2 = new VError();
            $view2->mostraErrore($msg);
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
        $id = $pm->CartaValida($dati['cf'],$dati['ccv'],$dati['data'],$dati['numero']);
        if ($id!=null)
        {
            $evento = $pm->Load($id_evento,'FEvento_p');
            $carta = $pm->Load($id,'FCarta');
            $acquisto = new EAcquisto(new DateTime('NOW'),$prezzo,$carta,$utente);
            $id_a = $pm->store($acquisto);
            $acquistobis = $pm->Load($id_a,'FAcquisto');
            $biglietto = new EBiglietto($prezzo,$evento,$acquistobis,$utente);
            //echo $biglietto->getEvento()->getId().$biglietto->getAcquisto()->getId(). $biglietto->getUtente()->getId();
            $pm->store($biglietto);
            $msg = "acquisto effettuato con successo";
        }
        else
        {
            $pm->incrementaposti($utente->getId(),$sessione->getposti());
            $msg2 = "si sono verificati problemi nell acquisto";
            $view2 = new VError();
            $view2->mostraErrore($msg2);
        }
        $sessione->prenotaposti(0);
        $view->AcquistoEffettuato($msg);
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
            $this->HomeEvento($id,$classe);
        }
        else
        {
            $view2 = new VError();
            $view2->mostraErrore("utente non loggato");
        }
    }

}