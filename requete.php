<?php


class requete {

    // parametre de la requete
    private $parametres;

    public function __construct($parametres){
        $this->parametres = $parametres;
    }

    // renvoie vrai si le parametre existe dans la requete
    public function parametreexiste($nom){
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    //Renvoie la valeur du parametre
    public function getparametre($nom){
        if($this->parametreexiste($nom)){
            return $this->parametres[$nom];
        }
        //renvoie une erreur si le parametre est introuvable
        else
            throw new Exception ("Paramètre '$nom' absent de la requete");
    }
}