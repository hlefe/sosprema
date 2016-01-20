<?php

class villeGateway {
     private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function ajouterVille($nomVille){
        $querry = 'INSERT INTO ville (nomVille) VALUES (:nomVille)';
        $this->bd->executeQuerry($querry, array(':nomVille'=>array($nomVille,PDO::PARAM_INT)));
    }

    public function rechercherVille($nomVille){
        $querry = 'SELECT * FROM ville WHERE nomVille=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nomVille,PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public function getAll(){
        $querry = 'SELECT * FROM ville';
        $this->bd->executeQuerry($querry);
        $results = $this->bd->getResults();
        return $results;
    }
}