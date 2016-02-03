<?php

class VilleGateway {
    
    public static function ajouterVille($nomVille){
        $querry = 'INSERT INTO ville (nomVille) VALUES (:nom)';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomVille,PDO::PARAM_INT)));
    }

    public static function rechercherVille($nomVille){
        $querry = 'SELECT * FROM ville WHERE nomVille=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomVille,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function getAll(){
        $querry = 'SELECT * FROM ville';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}