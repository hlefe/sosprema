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

    public function rechercherId($libelle){
        $querry = 'SELECT * FROM niveau WHERE libelle=:libelle';
        $this->bd->executeQuerry($querry, array(':libelle'=>array($libelle,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        $id = $result['id'];
        return $id;
    }

    public function getAll(){
    	$querry = 'SELECT * FROM niveau';
        $this->bd->executeQuerry($querry);
        $results = $this->bd->getResults();
        return $results;
    }
}