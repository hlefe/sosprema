<?php
/**
* Classe VilleGateway
*
* Gateway de Ville (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class VilleGateway {
    
    /**
    * Fonction d'ajout d'une ville. 
    * 
    * Permet d'ajouter une ville.
    * @param nomVille correspond au nom de la ville.
    * @param codePostal correspond au code postal de la ville.
    * @param idDepartement correspond à l'id du département auquel appartient le département.
    */
    public static function ajouterVille($nomVille, $codePostal, $idDepartement){
        $querry = 'INSERT INTO ville (nomVille, codePostal, idDepartement) VALUES (:nomVille, :codePostal, :idDepartement)';
        Connexion::executeQuerry($querry, array(':nomVille'=>array($nomVille,PDO::PARAM_STR),
                                                ':codePostal'=>array($codePostal,PDO::PARAM_INT),
                                                ':idDepartement'=>array($idDepartement,PDO::PARAM_STR)));
    }
    
    /**
    * Fonction de recherche d'une ville. 
    * 
    * Permet de rechercher une ville grâce à son nom et son code postal.
    * @param nomVille correspond au nom de la ville.
    * @param codePostal correspond au code postal de la ville.
    * @return result retourne le résultat de la recherche faux si la ville n'a pas été trouvée.
    */
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

    /**
    * Fonction de recherche d'une ville par son id. 
    * 
    * Permet de rechercher une ville par son id.
    * @param idVille correspond à l'id de la ville recherchée.
    * @return result retourne la ville rechercher ou faux si elle n'a pas été trouvée.
    */
    public static function rechercherVilleById($idVille){
        $querry = 'SELECT * FROM ville WHERE idVille=:idVille';
        Connexion::executeQuerry($querry, array(':idVille'=>array($idVille,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    /**
    * Fonction de récupération de l'ensemble des villes. 
    * 
    * Permet de récupérer l'ensemble des villes.
    * @return results retourne toutes les villes ou faux sinon.
    */
    public static function getAll(){
        $querry = 'SELECT * FROM ville';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}