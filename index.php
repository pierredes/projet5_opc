<?php

require 'controleur/controleur.php';

try{
    if(isset($_GET['action'])){
        if($_GET['action'] == 'post'){
            if(isset($_GET['numero_post'])){
                $idpost = intval($_GET['numero_post']);
                if($idpost != 0)
                    unpost($idpost);
                else
                    throw new exception ('Numéro de post non valide');
            }
            else
                throw new exception ('Numéro de post non défini');
        }
        else
            throw new exception ('Action non valide ');
    }
    else{
        accueil(); // action par défaut
    }
}
catch (Exception $e){
    erreur($e -> getMessage());
}

?>

