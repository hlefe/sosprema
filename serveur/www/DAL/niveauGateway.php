<?php

class niveauGateway {
	 private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function rechercherNom($idNiveau){
    	$querry = 'SELECT * FROM niveau WHERE idNiveau=:idNiveau';
        $this->bd->executeQuerry($querry, array(':idNiveau'=>array($idNiveau,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        $nom = $result['nom'];
        return $nom;
    }

    public function rechercheridNiveau($nom){
        $querry = 'SELECT * FROM niveau WHERE nom=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        $idNiveau = $result['idNiveau'];
        return $idNiveau;
    }

    public function getAll(){
    	$querry = 'SELECT * FROM niveau';
        $this->bd->executeQuerry($querry);
        $results = $this->bd->getResults();
        return $results;
    }
}