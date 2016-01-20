<?php

class departementGateway {
     private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function ajouterDepartement($nomDepartement){
<<<<<<< HEAD
        $querry = 'INSERT INTO ville (nomDepartement) VALUES (:nom)';
=======
        $querry = 'INSERT INTO departement (nomDepartement) VALUES (:nom)';
>>>>>>> ce53088... voila pour l'erreur que tu as eu
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