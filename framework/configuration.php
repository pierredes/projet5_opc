<?php

class configuration{

    private static $parametre;

    // fonction qui renvoie la d'un paramètre de configuration

    public static function valeurparametre($nom, $valeurdefaut = null){
        if(isset(self::tableauparametre()[$nom])){
            $valeur = self::tableauparametre()[$nom];
        }
        else{
            $valeur = $valeurdefaut;
        }
        return $valeur;
    }

    // fonction qui renvoie le tableau des paramètres en le changeant au besoin
    private static function tableauparametre(){
        if(self::$parametre == null){
            $cheminfichier = "config/prod.ini";
            if(!file_exists($cheminfichier)){
                $cheminfichier = "config/dev.ini";
            }
            if(!file_exists($cheminfichier)){
                throw new Exception ('Aucun fichier de configuration trouvé');
            }
            else{
                self::$parametre = parse_ini_file($cheminfichier);
            }
        }
        return self::$parametre;
    }

}

