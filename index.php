<?php
    require('controlers/frontend.php');

   try{
        if(isset($_GET['action'])){
            if($_GET['action']=='addPole'){
                addingPole($_POST['poleName'], $_POST['leader'], $_POST['nation']);
            }
        }

        else{
            /*
                Si aucune action n'a ete menee (c'est a dire, la personne arrive fraichement sur
                l'index, je l'affiche le formulaire de creation d'un pole 
            */
            displayForm();
       }
   }
   catch(Exception $e){
       echo("Une erreur est survenu lors de l'exection. La voici :".$e->getMessage());
   }