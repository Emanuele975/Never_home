<?php


class CGestioneEvento
{
    public function FormEvento()
    {
        $view = new Vlocale();
        $view->mostraformevento();
    }

    public function HomeEvento($evento)
    {
        $view = new VEvento();
        $view->Home($evento);
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
        $id = $pm->store($evento);
        $img = new EImmagine($dati['img'],$dati['tipo'],$id,'EEvento_g');
        $pm->store($img);
        $view = new Vlocale();
        $view->HomeLocale($evento,$img);
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
        $id = $pm->store($evento);
        $img = new EImmagine($dati['img'],$dati['tipo'],$id,'EEvento_p');
        $pm->store($img);
        $view = new Vlocale();
        $view->HomeLocale($evento,$img);
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
                $immagine = $pm->getImgByidEvento($evento->getId());
            } else {
                $msg = "Non ci sono ricette che soddisfano questi parametri";
            }
            $view->mostraRisultati($evento, $immagine, $msg);

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }

    public function FormAcquisto()
    {
        $view = new VAcquisto();
        $id = $_POST['evento'];
        $pm = FPersistenceManager::getInstance();
        $evento = $pm->Load($id,'FEvento_p');
        $immagine = $pm->getImgByidEvento($evento->getId());
        $view->FormAcquisto($evento,$immagine);

    }

    public function FormPagamento()
    {
        $view = new VAcquisto();
        $prezzo = $_POST['prezzotot'];
        $prezzo = $prezzo*$_POST['num'];
        $view->FormPagamento($prezzo);
    }

    public function Acquisto()
    {
        $view = new VAcquisto();
        $dati = $view->getDati();
        $pm = FPersistenceManager::getInstance();
        if ($pm->CartaValida($dati['cf'],$dati['ccv'],$dati['data'],$dati['numero']))
        {
            $acquisto = new EAcquisto();
        }
    }


}