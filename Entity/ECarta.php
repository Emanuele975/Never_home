<?php

    class ECarta{
        private $CF_titolare;
        private $ccv;
        private $data_di_scadenza;
        private $numerocarta;
        private $id;

        /** costruttore della classe
         * ECarta constructor.
         * @param String $CF_titolare
         * @param int $ccv
         * @param DateTime $data_di_scadenza
         * @param int $numerocarta
         */
        function __construct(String $CF_titolare, int $ccv, DateTime $data_di_scadenza, int $numerocarta ){
            $this->CF_titolare = $CF_titolare;
            $this->ccv = $ccv;
            $this->data_di_scadenza = $data_di_scadenza;
            $this->numerocarta = $numerocarta;
        }

        /**metodo che setta il CF del titolare della carta
         * @param String $CF_titolare
         */
        function setCF_titolare(String $CF_titolare){
            $this->CF_titolare = $CF_titolare;
        }

        /**metodo che ritorna il cf del titolare della carta
         * @return String
         */
        function getCF_titolare(){
            return $this->CF_titolare;
        }

        /**metodo che setta il ccv della carta
         * @param int $ccv
         */
        function setCcv(int $ccv){
            $this->ccv=ccv;
        }

        /**metodo che ritorna il ccv della carta
         * @return int
         */
        function getCcv(){
            return $this->ccv;    
        }

        /**metodo che setta la data di scadenza della carta
         * @param DateTime $data_di_scadenza
         */
        function setData_di_scadenza(DateTime $data_di_scadenza){
            $this->data_di_scadenza = $data_di_scadenza;
        }

        /** metodo che ritorna la data di scadenza della carta
         * @return DateTime
         */
        function getData_di_scadenza(){
            return $this->data_di_scadenza;
        }

        /** metodo che setta il numero della carta
         * @param int $numerocarta
         */
         function setNumerocarta(int $numerocarta){
            $this->numerocarta = $numerocarta;
        }

        /**metodo che ritorna il numero della carta
         * @return int
         */
        function getNumerocarta(){
            return $this->numerocarta; 
        }

        /**metodo che setta l'id della carta
         * @param $id
         */
        function setId($id)
        {
            $this->id=$id;
        }

        /**metodo che ritorna l'id della carta
         * @return mixed
         */
        function getId()
        {
            return $this->id;
        }

        /**metodo che ritorna i dati relativi della carta
         * @return string
         */
        function toString(){
            return "il codice fiscale del proprietario della carta: ".$this->CF_titolare."\n".
                    "il ccv :".$this->ccv."\n".
                    "la data di scadenza: ".$this->data_di_scadenza->format('d-m-Y')."\n".
                    "il numero della carta: ".$this->numerocarta."\n";
        }

        /** metodo che ritorna la classe foundation relativa
         * @return string
         */
        function getF(){
            return "FCarta";
        }

        /**merodo che ritorna la chiave primaria della classe
         * @return mixed
         */
        function getKey()
        {
            return $this->id;
        }

      
    }        
?>