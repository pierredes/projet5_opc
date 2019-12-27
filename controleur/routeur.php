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
                    $idpost = intval($_GET['numero_post']);
                    if($idpost != 0){
                        $this->controleurUnpost->detailsunpost($idpost);
                    }
                    else
                        throw new Exception ('Identifiant de post invalide');
                }
                else if ($_GET["action"] == 'commenter'){
                    $contenu = $this->getparametre($_POST, 'contenu');
                    $numero_post = $this->getparametre($_POST, 'numero_post');
                    $this->controleurUnpost->commenter($contenu, $numero_post);
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

    private function getparametre($tableau, $nom){
        if(isset($tableau[$nom])){
            return $tableau[$nom];
        }
        else
            throw new Exception ('Paramètre' .$nom. 'absent');
    }
}



?>