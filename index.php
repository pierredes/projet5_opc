<?php
require 'modele.php';

try{
    $post = touslesposts();
    require 'vueAccueil.php';
}
catch(Exception $e){
    $messageerreur = $e->getMessage();
    require 'vueerreur.php';
}

?>

