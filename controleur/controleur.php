<?php
require 'modele/modele.php';

// Affiche tous les posts

function accueil(){
    $post = touslesposts();
    require 'vue/vueAccueil.php';
}

// Affiche les détails d'un post


function unpost($idpost){
    $post = detailspost($idpost);
    $commentaire = commentairedunpost($idpost);
    require 'vue/vuepost.php';
}

// Affiche les erreurs

function erreur($messageerreur){
    require 'vue/vueerreur';
}

?>