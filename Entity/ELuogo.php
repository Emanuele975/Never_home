<?php

    class ELuogo{
        private $nome;
        private $indirizzo;
        private $email;
        private $username;
        private $password;
        private $id;

        function __construct(String $nome,String $indirizzo,String $email,String $username,String $password){
            $this->nome=$nome;
            $this->indirizzo=$indirizzo;
            $this->email=$email;
            $this->username=$username;
            $this->password=$password;
        }
        
        function setNome(String $nome){
            $this->nome=$nome;
        }
        
        function getNome(){
            return $this->nome;
        }
        
        function setIndirizzo(String $indirizzo){
            $this->indirizzo=$indirizzo;
        }
        
        function getIndirizzo(){
            return $this->indirizzo;
        }
        
        function setEmail(String $email){
            $this->email=$email;
        }
        
        function getEmail(){
            return $this->email;
        }
        
        function setUsername(String $username){
            $this->username=$username;
        }
        
        function getUsername(){
            return $this->username;
        }
        
        function setPassword(String $password){
            $this->password=$password;
        }
        
        function getPassword(){
            return $this->password;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($id)
        {
            $this->id=$id;
        }

        function toString(){
            return "il nome del luogo: ".$this->nome."\n".
                    "l indirizzo: ".$this->indirizzo."\n".
                    "l email: ".$this->email."\n".
                    "l username: ".$this->username."\n".
                    "la password: ".$this->password."\n";
        }

        function getF(){
            return "FLuogo";
        }

        function getKey(){

            return $this->indirizzo;
        }
       
        
    }

?>