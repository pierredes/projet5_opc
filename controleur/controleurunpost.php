<?php

require_once 'modele/post.php';
require_once 'modele/commentaire.php';
require_once 'vue/vue.php';


class controleurUnpost{

    private $post;
    private $commentaire;

    public function __construct(){
        $this->post = new post();
        $this->commentaire = new commentaire();
    }

    // affiche les détails d'un post

    public function detailsunpost($idpost){
        $post = $this->post->detailspost($idpost);
        $commentaire = $this->commentaire->commentairedunpost($idpost);
        $vue = new vue("post");
        $vue->generer(array('post' => $post, 'commentaire' => $commentaire));
    }
}


?>