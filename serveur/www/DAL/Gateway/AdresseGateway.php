<?php

class AdresseGateway {
    
    public static function ajouterAdresse($numRue, $nomRue, $idVille){
        $querry = 'INSERT INTO adresse (numRue, nomRue, idVille) VALUES (:numRue, :nomRue, :idVille)';
        
        Connexion::executeQuerry($querry, array(':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR),
                                                ':idVille'=>array($idVille,PDO::PARAM_INT)));        
    }
    
    public static function rechercherAdresse($numRue, $nomRue, $idVille){
        $querry = 'SELECT * FROM adresse WHERE numRue=:numRue AND nomRue=:nomRue AND idVille = :idVille';
        
        Connexion::executeQuerry($querry, array(':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR),
                                                ':idVille'=>array($idVille,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        return $result;
    }

    public static function rechercherAdresseById($idAdresse){
        $querry = 'SELECT * FROM adresse WHERE idAdresse=:idAdresse';
        Connexion::executeQuerry($querry, array(':idAdresse'=>array($idAdresse,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }
    
    public static function getAll(){
        $querry = 'SELECT * FROM adresse';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}
