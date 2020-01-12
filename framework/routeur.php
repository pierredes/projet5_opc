<?php

require_once 'requete.php';
require_once 'vue.php';

class routeur{

    public function routerrequete(){
        try{
            $requete = new requete(array_merge($_GET, $_POST));
            var_dump($requete);
            $controleur = $this->creercontroleur($requete);
            var_dump($controleur);
            $action = $this->creeraction($requete);
            var_dump($action);
            $controleur->executeraction($action);
        }
        catch (Exception $e){
            $this->erreur($e);
        }
    }

    private function creercontroleur(requete $requete){
        $controleur = 'accueil'; // controleur par défaut
        if($requete->parametreexiste('controleur')){
            $controleur = $requete->getparametre('controleur');
            
            
        }
        $classecontroleur = 'controleur'. $controleur;
        var_dump($controleur);
        var_dump($classecontroleur);
        $fichiercontroleur = 'controleur/'. $classecontroleur . '.php';
        if(file_exists($fichiercontroleur)){            
            require($fichiercontroleur);
            $controleur = new $classecontroleur();
            $controleur->setrequete($requete);
            return $controleur;
        }
        else
            throw new Exception("Fichier ' $fichiercontroleur ' introuvable");

    }

    private function creeraction(requete $requete){
        $action = "index"; // action par défaut
        if($requete->parametreexiste('action')){
            $action = $requete->getparametre('action');
        }
        return $action;
    }


    // affichage d'une erreur
    private function erreur(Exception $messageerreur){
        $vue = new vue('vueerreur');
        $vue->generer(array('messageerreur' => $messageerreur->getMessage()));
    }

}



?>