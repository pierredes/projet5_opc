<?php

abstract class modele{

    // accès à la base de données
    private $bdd;

    // Execute une rêquete sql avec ou sans paramètre

    protected function executerrequete($requete, $params = null){
        if($params == null){
            $resultat = $this->connectionbdd()->query($requete); // execution direct (sans parametre)
        }
        else{
            $resultat = $this->connectionbdd()->prepare($requete); // execution préparée (avec parametre)
            $resultat->execute($params);
        }
        return $resultat;
    }

    // connexion à la base de données
    private function connectionbdd(){
        if($this->bdd == null){
            $this->$bdd = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->$bdd;
    }
}










