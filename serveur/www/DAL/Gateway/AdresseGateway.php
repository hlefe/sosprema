<?php

class AdresseGateway {
    
    public static function ajouterAdresse($numRue, $nomRue, $idVille){
        $querry = 'INSERT INTO adresse (numRue, nomRue, idVille) VALUES (:numRue, :nomRue, :idVille)';
        
        Connexion::executeQuerry($querry, array(':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR),
                                                ':idVille'=>array($idVille,PDO::PARAM_INT)));        
    }
    
    public static function rechercherAdresse($numRue, $nomRue){
        $querry = 'SELECT * FROM adresse WHERE numRue=:numRue AND nomRue=:nomRue';
        
        Connexion::executeQuerry($querry, array(':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        return $result;
    }
    
    public static function getAll(){
        $querry = 'SELECT * FROM adresse';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}
