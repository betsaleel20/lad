<?php

    require_once('./models/Pole.php');

    function displayForm(){
        require('./views/frontend/poleView.php');
    }

    function addingPole($name, $leader, $nation)
    {
        $pole= new Pole($name, $leader, $nation);
        $result=$pole->addPole($name, $leader, $nation);
        if($result){
            require('./views/frontend/poleView.php');
        }
        else{
            throw new Exception("Echec d'ajout du pole");
        }
        
    }

    function poleList()
    {
        $emptyPole= new Pole('','','');
        $list= $emptyPole->getPoleList();
        if(!empty($list)){
            return $list;
        }
        else{
            return false;
        }
    }