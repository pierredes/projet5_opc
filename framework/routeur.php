<?php

require_once 'requete.php';
require_once 'vue.php';

class routeur{

    public function routerrequete(){
        try{
            $requete = new requete(array_merge($_GET, $_POST));
            $controleur = $this->creercontroleur($requete);
            $action = $this->creeraction($requete);
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