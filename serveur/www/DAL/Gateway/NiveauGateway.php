<?php
/**
* Classe NiveauGateway
*
* Gateway de Niveau (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class NiveauGateway
{   

    /**
    * Fonction de recherche du nom du niveau utilisateur. 
    * 
    * Permet de rechercher le nom du niveau utilisateur correspondant à l'id du niveau.
    * @param idNiveau correspond à l'id du niveau utilisateur rechercher.
    * @return nom correspond au nom qui identifie le niveau d'utilisateur (ex: administrateur).
    */
    public static function rechercherNom($idNiveau){
    	$querry = 'SELECT * FROM niveau WHERE idNiveau=:idNiveau';
        Connexion::executeQuerry($querry, array(':idNiveau'=>array($idNiveau,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $nom = $result['nom'];
        return $nom;
    }

    /**
    * Fonction de recherche l'id du niveau utilisateur. 
    * 
    * Permet de rechercher l'id du niveau utilisateur correspondant au nom du niveau.
    * @param nom correspond au nom qui identifie le niveau d'utilisateur (ex: administrateur).
    * @return idNiveau correspond à l'id du niveau utilisateur.
    */
    public static function rechercheridNiveau($nom){
        $querry = 'SELECT * FROM niveau WHERE nom=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $idNiveau = $result['idNiveau'];
        return $idNiveau;
    }

    /**
    * Fonction de récupération de l'ensembl des niveaux utilisateurs. 
    * 
    * Permet de récupérer de l'ensembl des niveaux utilisateurs.
    * @return result est un tableau correspondant au résultat de la requête SQL.
    */
    public static function getAll(){
    	$querry = 'SELECT * FROM niveau';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}