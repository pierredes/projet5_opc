<?php

require_once 'configuration.php'

abstract class modele{

    // accès à la base de données
    private static $bdd;

    // Execute une rêquete sql avec ou sans paramètre

    protected function executerrequete($requete, $params = null ){
        if($params == null){
            $resultat = self::connectionbdd()->query($requete); // execution direct (sans parametre)
        }
        else{
            $resultat = self::connectionbdd()->prepare($requete); // execution préparée (avec parametre)
            $resultat->execute($params);
        }
        return $resultat;
    }

    // connexion à la base de données
    private static function connectionbdd(){
        if(self::$bdd === null){
            // on récupère les paramètres de connexion a la bdd
            $dsn = configuration::get('dsn');
            $login = configuration::get('login');
            $mot_de_passe = configuration::get('mot_de_passe');

            // connexion
            self::$bdd = new PDO($dsn, $login, $mot_de_passe, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
}










