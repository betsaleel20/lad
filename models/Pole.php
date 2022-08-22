<?php
    require_once('Connexion.php');

    class Pole extends Connexion{
        private $_polename;
        private $_leader;
        private $_nation;


        public function __construct($name, $leader, $nation)
        {
            $this->setPolename($name);
            $this->setLeader($leader);
            $this->setNation($nation);
        }

        // Création de setters et getters

        public function setPolename(string $var){ $this->_polename=$var; }
        public function setLeader(string $var){ $this->_leader=$var; }
        public function setNation(string $var){ $this->_nation=$var; }


        public function getPolename(){ return $this->_polename; }
        public function getLeader(){ return $this->_leader; }
        public function getNation(){ return $this->_nation; }


        public function addPole($name, $leader, $nation){
            $pole= new Pole($name, $leader, $nation);
            $bdd= $this->connexionDB();
            $req=$bdd->prepare("INSERT INTO pole VALUES('',?,?,?)");
            $affectedLines= $req->execute(array($pole->getPolename(), $pole->getLeader(), $pole->getNation()));
            return $affectedLines;
        }

        public function getPoleList()
        {
            $bdd= $this->connexionDB();
            $req= $bdd->query("SELECT* FROM pole");
            $poles=[];
            $identifiants=[];
            while($occurence=$req->fetch(PDO::FETCH_ASSOC)){
                $pole= new Pole($occurence['polename'], $occurence['leader'],$occurence['nation']);
                $poles[]= $pole;
                $identifiants[]= $occurence['id'];
            }
            $tab=[2];
            $tab[0]= $poles;
            $tab[1]=$identifiants;
            return $tab;
        }
    }