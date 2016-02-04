<?php

class DepartementGateway {
    
    public static function ajouterDepartement($nomDepartement, $idRegion){
        $querry = 'INSERT INTO departement (nomDepartement, idRegion) VALUES (:nom, :idRegion)';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomDepartement,PDO::PARAM_INT),
                                                ':idRegion'=>array($idRegion,PDO::PARAM_INT)));
    }

    public static function rechercherDepartement($nomDepartement){
        $querry = 'SELECT * FROM departement WHERE nomDepartement=:nomDepartement';
        Connexion::executeQuerry($querry, array(':nomDepartement'=>array($nomDepartement,PDO::PARAM_STR)));
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