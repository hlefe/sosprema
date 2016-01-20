<?php

class regionGateway {
    
    private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function ajouterRegion($nomRegion){
        $querry = 'INSERT INTO region (nomRegion) VALUES (:nom)';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nomRegion,PDO::PARAM_INT)));
    }

    public function rechercherRegion($nomRegion){
        $querry = 'SELECT * FROM region WHERE nomRegion=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nomRegion,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public function getAll(){
        $querry = 'SELECT * FROM region';
        $this->bd->executeQuerry($querry);
        $results = $this->bd->getResults();
        return $results;
    }
}