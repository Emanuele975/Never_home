<?php
//controllare la modifica
    class ECarta{
        private $CF_titolare;
        private $ccv;
        private $data_di_scadenza;
        private $numerocarta;
      
      
        function __construct(String $CF_titolare, int $ccv, DateTime $data_di_scadenza, int $numerocarta ){
            $this->CF_titolare = $CF_titolare;
            $this->ccv = $ccv;
            $this->data_di_scadenza = $data_di_scadenza;
            $this->numerocarta = $numerocarta;
        }    
      
      
        function setCF_titolare(String $CF_titolare){
            $this->CF_titolare = $CF_titolare;
        }
         

        function getCF_titolare(){
            return $this->CF_titolare;
        }
          
          
        function setCcv(int $ccv){
            $this->ccv=ccv;
        }
         

        function getCcv(){
            return $this->ccv;    
        }



        function setData_di_scadenza(DateTime $data_di_scadenza){
            $this->data_di_scadenza = $data_di_scadenza;
        }
         

        function getData_di_scadenza(){
            return $this->data_di_scadenza;
        } 
          
          
          
         function setNumerocarta(int $numerocarta){
            $this->numerocarta = $numerocarta;
        }
         

        function getNumerocarta(){
            return $this->numerocarta; 
        }
        
        function toString(){
            return "il codice fiscale del proprietario della carta: ".$this->CF_titolare."\n".
                    "il ccv :".$this->ccv."\n".
                    "la data di scadenza: ".$this->data_di_scadenza->format('d-m-Y')."\n".
                    "il numero della carta: ".$this->numerocarta."\n";
        }

      
    }        
?>