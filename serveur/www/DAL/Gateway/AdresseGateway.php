<?php
/**
* Classe AdresseGateway
*
* Gateway de l'adresse (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class AdresseGateway {
    /**
    * Fonction d'ajout d'une adresse
    * 
    * Ajouter une adresse dans la table adresse de la base SQL.
    * @param numRue correspond au numéro de rue de l'adresse.
    * @param nomRue correspond au nom de rue de l'adresse.
    * @param idVille correspond à l'id de la ville dans laquelle se trouve l'adresse.
    * @return result retourne le résultat de l'ajout de l'adresse.
    */
    public static function ajouterAdresse($numRue, $nomRue, $idVille){
        $querry = 'INSERT INTO adresse (numRue, nomRue, idVille) VALUES (:numRue, :nomRue, :idVille)';
        
        Connexion::executeQuerry($querry, array(':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR),
                                                ':idVille'=>array($idVille,PDO::PARAM_INT)));        
    }
    
    /**
    * Fonction de recherche d'une adresse.
    * 
    * rechercher une adresse dans la table adresse de la base SQL.
    * @param numRue correspond au numéro de rue de l'adresse.
    * @param nomRue correspond au nom de rue de l'adresse.
    * @param idVille correspond à l'id de la ville dans laquelle se trouve l'adresse.
    * @return result retourne le résultat de la recherche de l'adresse.
    */
    public static function rechercherAdresse($numRue, $nomRue, $idVille){
        $querry = 'SELECT * FROM adresse WHERE numRue=:numRue AND nomRue=:nomRue AND idVille = :idVille';
        
        Connexion::executeQuerry($querry, array(':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR),
                                                ':idVille'=>array($idVille,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        return $result;
    }

    /**
    * Fonction de recheche d'une adresse par l'id de l'adresse.
    * 
    * Recherche une adresse dans la table adresse de la base SQL avec l'id de l'adresse.
    * Utilisé pour récupérer l'adresse d'un utilisateur.
    * @param numRue correspond au numéro de rue de l'adresse.
    * @param nomRue correspond au nom de rue de l'adresse.
    * @param idVille correspond à l'id de la ville dans laquelle se trouve l'adresse.
    * @return result retourne le résultat de la recherche de l'adresse.
    */
    public static function rechercherAdresseById($idAdresse){
        $querry = 'SELECT * FROM adresse WHERE idAdresse=:idAdresse';
        Connexion::executeQuerry($querry, array(':idAdresse'=>array($idAdresse,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }
    
    /**
    * Fonction de récupéreration l'ensemble des adresse.
    * 
    * Récupère l'ensemble des adresse de la table, cette fonction n'est pas utilisée pour le moment.
    * @return result retourne le résultat de la recherche de l'adresse.
    */
    public static function getAll(){
        $querry = 'SELECT * FROM adresse';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}
