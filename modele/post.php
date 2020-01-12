<?php

require_once 'framework/modele.php';

class post extends modele {

    // Renvoie toutes les informations de la table post

    public function touslesposts(){
        $requete = 'SELECT * FROM posts';
        $post = $this->executerrequete($requete);
        return $post;
    }

    // Renvoie les informations d'un seul post

    public function detailspost($idpost){
        $requete = 'SELECT * FROM posts WHERE numero_post=?';
        $post = $this->executerrequete($requete, array($idpost));
        if($post->rowCount() == 1)
            return $post->fetch();
        else
            throw new exception ("Aucun post ne correspond à l'identifiant $idpost");
    } 
}






?>