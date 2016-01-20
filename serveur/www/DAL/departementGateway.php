<?php

class departementGateway {
     private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function ajouterRegion($nomDepartement){
        $querry = 'INSERT INTO region (nomDepartement) VALUES (:nom)';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nomDepartement,PDO::PARAM_INT)));
    }

    public function rechercherDepartement($nomDepartement){
        $querry = 'SELECT * FROM departement WHERE nomDepartement=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nomDepartement,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public function getAll(){
        $querry = 'SELECT * FROM departement';
        $this->bd->executeQuerry($querry);
        $results = $this->bd->getResults();
        return $results;
    }
}