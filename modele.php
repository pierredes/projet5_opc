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



