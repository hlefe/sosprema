<?php

class RegionGateway {
    
    public static function ajouterRegion($nomRegion){
        $querry = 'INSERT INTO region (nomRegion) VALUES (:nom)';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomRegion,PDO::PARAM_INT)));
    }

    public static function rechercherRegion($nomRegion){
        $querry = 'SELECT * FROM region WHERE nomRegion=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomRegion,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function rechercherRegionById($idRegion){
        $querry = 'SELECT * FROM departement WHERE idRegion=:idRegion';
        Connexion::executeQuerry($querry, array(':idRegion'=>array($idRegion,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function getAll(){
        $querry = 'SELECT * FROM region';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}