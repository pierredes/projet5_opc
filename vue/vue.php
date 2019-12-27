<?php

class vue{

    private $fichier;

    private $titre;

    public function __construct($action){
        // nom de la page à afficher en fonction de l'action a effectuer
        $this->fichier = "vue/vue" .$action. ".php";
    }

    // génère et affiche la vue
    public function generer($donnees){
        // génère la partie spécifique
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // génère la partie commune en utilisant la partie spécifique
        $vue = $this->genererfichier('vue/gabari.php', array('titre' => $this->titre, 'contenu' => $contenu));
        echo $vue;
    }

    // génère un fichier vue et renvoie le résultat
    private function genererfichier($fichier, $donnees){
        if(file_exists($fichier)){
            // Rend les éléments du tableau $donnees visible dans la vue
            extract($donnees);

            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        else{
            throw new Exception ('Fichier' .$fichier. 'introuvable');
        }
    }
    
}




?>