<?php

require_once 'modele/post.php';
require_once 'modele/commentaire.php';
require_once 'framework/controleur.php';


class controleurunpost extends controleur{

    private $post;
    private $commentaire;

    public function __construct(){
        $this->post = new post();
        $this->commentaire = new commentaire();
    }

    // affiche les détails d'un post

    public function index(){
        $idpost = $this->requete->getparametre('numero_post');
        $post = $this->post->detailspost($idpost);
        $commentaire = $this->commentaire->commentairedunpost($idpost);
        $this->generervue(array('post' => $post, 'commentaire' => $commentaire));
    }

    public function commenter(){
        $idpost = $this->requete->getparametre('numero_post');
        $contenu = $this->requete->getparametre('contenu');
        $this->commentaire->ajouteruncomentaire($contenu, $numero_post);
        $this->executeraction('index');
    }
}


?>