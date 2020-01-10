<?php

require_once 'requete.php';
require_once 'vue/vue.php';

abstract class controleur{

    private $action;
    protected $requete;

    public function setrequete(requete $requete){
        $this->requete = $requete;
    }

    public function executeraction($action){
        if(method_exists($this, $action)){
            $this->action = $action;
            $this->{$this->action}();
        }
        else{
            $classecontroleur = get_class($this);
            throw new Exception ("Action '$action' non défini dans la classe $classecontroleur");
        }
    }

    public abstract function index();

    protected function generervue($donneesvue =array()){
        $classecontroleur = get_class($this);
        $controleur = str_replace("controleur", "", $classecontroleur);
        $vue = new vue($this->action, $controleur);
        $vue->generer($donneesvue);
    }
}