<?php

function touslesposts(){
    $bdd = connectionbdd();
    $post = $bdd->query('SELECT * FROM posts');
    return $post;
}

function connectionbdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function detailspost($idpost){
    $bdd = connectionbdd();
    $post = $bdd->prepare('SELECT * FROM posts WHERE numero_post=?');
    $post-> execute(array($idpost));
    if($post->rowCount() == 1)
        return $post->fetch();
    else
        throw new excption ("Aucun post ne correspond à l'identifiant $idpost");
}

function commentairedunpost($idpost){
    $bdd = connectionbdd();
    $commentaire = $bdd->prepare('SELECT * FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id WHERE numero_post = ? AND valider= "1" ');
    $commentaire->execute(array($idpost));
    return $commentaire;
}


