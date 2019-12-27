<?php

require_once 'modele/post.php';
require_once 'vue/vue.php';

class controleuraccueil{
    private $post;

    public function __construct(){
        $this->post = new post();
    }

    // Affiche tous les posts du post du blog
    public function accueil(){
        $post = $this->post->touslesposts();
        $vue = new vue('Accueil');
        $vue->generer(array('post' => $post));
    }
}

?>