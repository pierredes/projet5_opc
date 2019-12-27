<?php

require_once 'controleur/controleuraccueil.php';
require_once 'controleur/controleurunpost.php';
require_once 'vue/vue.php';

class routeur{
    
    private $controleuraccueil;
    private $controleurUnpost;

    public function __construct(){
        $this->controleuraccueil = new controleuraccueil();
        $this->controleurUnpost = new controleurUnpost();
    }

    public function routerrequete(){
        try{
            if(isset($_GET['action'])){
                if($_GET['action'] == 'post'){
                    if(isset($_GET['numero_post'])){
                        $idpost = intval($_GET['numero_post']);
                        if($idpost != 0){
                            $this->controleurUnpost->detailsunpost($idpost);
                        }
                        else
                            throw new Exception ('Identifiant de post invalide');
                    }
                    else
                    throw new Exception ('Identifiant de post non défini');
                }
                else
                throw new Exception ('Action non valide');
            }
            else{ // aucune action défini : affichage de la page d'accueil
                $this->controleuraccueil->accueil();
            }
        }
        catch (Exception $e){
            $this->erreur($e->getMessage());
        }
    }

    // affichage d'une erreur
    private function erreur($messageerreur){
        $vue = new vue('Erreur');
        $vue->generer(array('messageerreur' => $messageerreur));
    }
}


?>