<?php

class niveauGateway {
	 private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function rechercherLibeller($id){
    	$querry = 'SELECT * FROM niveau WHERE id=:id';
        $this->bd->executeQuerry($querry, array(':id'=>array($id,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        $libelle = $result['libelle'];
        return $libelle;
    }
}