<?php

class DepartementGateway {
    
    public static function ajouterDepartement($nomDepartement){
        $querry = 'INSERT INTO departement (nomDepartement) VALUES (:nom)';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomDepartement,PDO::PARAM_INT)));
    }

    public static function rechercherDepartement($nomDepartement){
        $querry = 'SELECT * FROM departement WHERE nomDepartement=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomDepartement,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function getAll(){
        $querry = 'SELECT * FROM departement';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}