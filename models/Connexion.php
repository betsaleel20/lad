<?php

    class Connexion{
        // private $_bdd;

        // public function __construct($object)
        // {
        //     $this->setBdd($object);
        // }

        // public function setBdd(PDO $object){ $this->_bdd=$object; }

        // public function getBdd(){ return $this->_bdd; }


        protected function connexionDB()
        {
            $connexion= new PDO('mysql:host=localhost;dbname=lad;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $connexion;
        }

    }