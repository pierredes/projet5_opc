<?php

function touslesposts(){
    $bdd = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');
    $post = $bdd->query('SELECT * FROM posts');
    return $post;
}



