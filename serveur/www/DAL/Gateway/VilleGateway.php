<?php

class VilleGateway {
    
    public static function ajouterVille($nomVille, $codePostal, $idDepartement){
        $querry = 'INSERT INTO ville (nomVille, codePostal, idDepartement) VALUES (:nomVille, :codePostal, :idDepartement)';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomVille,PDO::PARAM_STR),
                                                ':codePostal'=>array($codePostal,PDO::PARAM_INT),
                                                ':idDepartement'=>array($idDepartement,PDO::PARAM_INT)));
    }
    
    public static function rechercherVille($nomVille, $codePostal){
        $querry = 'SELECT * FROM ville WHERE nomVille=:nom AND codePostal=:codePostal';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomVille,PDO::PARAM_STR)
                                                ':codePostal'=>array($codePostal, PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function rechercherVilleById($idVille){
        $querry = 'SELECT * FROM departement WHERE idVille=:idVille';
        Connexion::executeQuerry($querry, array(':idVille'=>array($idVille,PDO::PARAM_STR)));
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