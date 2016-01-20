<?php

class departementGateway {
     private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function rechercherNom($id){
        $querry = 'SELECT * FROM departement WHERE iddepartement=:id';
        $this->bd->executeQuerry($querry, array(':id'=>array($id,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        $nom = $result['nom'];
        return $nom;
    }

    public function rechercherId($nom){
        $querry = 'SELECT * FROM departement WHERE nom=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        $iddepartement = $result['iddepartement'];
        return $iddepartement;
    }

    public function getAll(){
        $querry = 'SELECT * FROM departement';
        $this->bd->executeQuerry($querry);
        $results = $this->bd->getResults();
        return $results;
    }
}