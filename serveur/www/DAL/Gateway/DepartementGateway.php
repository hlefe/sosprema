<?php
/**
* Classe DepartementGateway
*
* Gateway de Departement (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class DepartementGateway {
    
    /**
    * Fonction d'ajout d'un département.
    * 
    * Permet d'ajouter un département.
    * @param nomDepartement correspond au nom du département.
    * @param idRegion correspond à l'id de la région qui possède le département.
    */
    public static function ajouterDepartement($nomDepartement, $idRegion){
        $querry = 'INSERT INTO departement (nomDepartement, idRegion) VALUES (:nom, :idRegion)';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomDepartement,PDO::PARAM_INT),
                                                ':idRegion'=>array($idRegion,PDO::PARAM_INT)));
    }
     /**
    * Fonction de recherche d'un département par son nom.
    * 
    * Permet de rechercher un département par son nom.
    * @param nomDepartement correspond au nom du département.
    * @return result correspond au résultat de la recherche.
    */
    public static function rechercherDepartement($nomDepartement){
        $querry = 'SELECT * FROM departement WHERE nomDepartement=:nomDepartement';
        Connexion::executeQuerry($querry, array(':nomDepartement'=>array($nomDepartement,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    /**
    * Fonction de recherche d'un département par son id.
    * 
    * Permet de rechercher un département par son id de façon a rechercher à qu'elle département appartient une ville.
    * @param idDepartement correspond à l'id du département.
    * @return result correspond au résultat de la recherche.
    */
    public static function rechercherDepartementById($idDepartement){
        $querry = 'SELECT * FROM departement WHERE idDepartement=:idDepartement';
        Connexion::executeQuerry($querry, array(':idDepartement'=>array($idDepartement,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }


     /**
    * Fonction de récupération de l'ensemble des département.
    * 
    * Permet de récupérer l'ensembles des département.
    * @return result correspond au résultat de la recherche.
    */
    public static function getAll(){
        $querry = 'SELECT * FROM departement';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}