<?php
/**
* Classe RegionGateway
*
* Gateway de la région (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class RegionGateway {
    
    /**
    * Fonction d'ajout d'une région. 
    * 
    * Permet d'ajouter une région.
    * @param nomRegion corespond au nom de la region.
    */
    public static function ajouterRegion($nomRegion){
        $querry = 'INSERT INTO region (nomRegion) VALUES (:nom)';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomRegion,PDO::PARAM_INT)));
    }

    /**
    * Fonction de recherche d'une région. 
    * 
    * Permet de rechercher une région par son nom.
    * @param nomRegion correspond au nom de la région recherchée.
    * @return result correspond à la région qui a été recherchée.
    */
    public static function rechercherRegion($nomRegion){
        $querry = 'SELECT * FROM region WHERE nomRegion=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomRegion,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    /**
    * Fonction de recherche d'une région. 
    * 
    * Permet de rechercher une région par son id.
    * @param idRegion correspond à l'id de la région recherchée.
    * @return result correspond à la région qui a été recherchée.
    */
    public static function rechercherRegionById($idRegion){
        $querry = 'SELECT * FROM region WHERE idRegion=:idRegion';
        Connexion::executeQuerry($querry, array(':idRegion'=>array($idRegion,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    /**
    * Fonction de récupérer l'ensemble des régions.
    *
    * Permet de récupération l'ensemble des régions.
    * @return result correspond à l'ensemble des régions trouvéés. 
    */
    public static function getAll(){
        $querry = 'SELECT * FROM region';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}