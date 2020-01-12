<?php

require_once 'framework/modele.php';

class commentaire extends modele{

    // Renvoie les commentaires valider d'un post

    public function commentairedunpost($idpost){
        $requete = 'SELECT * FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id WHERE numero_post = ? AND valider= "1" ';
        $commentaire = $this->executerrequete($requete, array($idpost));
        return $commentaire;
    }

    // Ajouter un commentaire dans la base

     public function ajouteruncomentaire($contenu, $numero_post){
         $requete = 'INSERT INTO commentaire (contenu, date, numero_post, valider, id_utilisateur) VALUES (?,now(),?, 0, 3)';
         $this->executerrequete($requete, array($contenu, $numero_post));
     }   
}

?>