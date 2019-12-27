<?php

require 'modele.php';

try{
    if(isset($_GET['numero_post'])){
        $numero_post = intval($_GET['numero_post']);
        if($numero_post != 0){
            $post = detailspost($numero_post);
            $commentaire = commentairedunpost($numero_post);
            require 'vuepost.php';
        }
        else
            throw new exception ('Numéro de post incorrect');
    }
    else
        throw new exception ('Aucun numéro de post');
}
catch(exception $e){
    $messageerreur = $e->getMessage();
    require 'vueerreur.php';
}