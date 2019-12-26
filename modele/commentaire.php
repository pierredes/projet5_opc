<?php

require_once 'modele/modele.php';

class commentaire extends modele{

    // Renvoie les commentaires valider d'un post

    public function commentairedunpost($idpost){
        $requete = 'SELECT * FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id
        WHERE numero_post = ? AND valider= "1" ';
        $commentaire= $this->executerrequete($requete, array($idpost));
        return $commentaire;
    }
}

?>