<?php
/**
* Classe VilleGateway
*
* Gateway de Ville (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class VilleGateway {
    
    public static function ajouterVille($nomVille, $codePostal, $idDepartement){
        $querry = 'INSERT INTO ville (nomVille, codePostal, idDepartement) VALUES (:nomVille, :codePostal, :idDepartement)';
        Connexion::executeQuerry($querry, array(':nomVille'=>array($nomVille,PDO::PARAM_STR),
                                                ':codePostal'=>array($codePostal,PDO::PARAM_INT),
                                                ':idDepartement'=>array($idDepartement,PDO::PARAM_STR)));
    }
    
    public static function rechercherVille($nomVille, $codePostal){
        $querry = 'SELECT * FROM ville WHERE nomVille=:nom AND codePostal=:codePostal';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomVille,PDO::PARAM_STR),
                                                ':codePostal'=>array($codePostal, PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function rechercherVilleById($idVille){
        $querry = 'SELECT * FROM ville WHERE idVille=:idVille';
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