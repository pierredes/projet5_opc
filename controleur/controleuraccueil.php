<?php

require_once 'modele/post.php';
require_once 'framework/controleur.php';

class controleuraccueil extends controleur{
    private $post;

    public function __construct(){
        $this->post = new post();
    }

    // Affiche tous les posts du post du blog
    public function index(){
        $post = $this->post->touslesposts();
        $this->generervue(array('post' => $post));
    }
}

?>