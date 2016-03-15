<?php
/**
* Classe RelationGateway
*
* Gateway de Relation (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class RelationGateway
{

    /**
    * Fonction de recherche de l'id d'un contact local. 
    * 
    * Permet de rechercher l'id d'un contact local.
    * @param idHopital correspond à l'id de l'hôpital en relation avec les contact hôpital.
    * @return results correspond à l'ensemble idContact, id Hopital avec l'id de l'hôpital rechercher.
    */
    public static function rechercherContactLocalByIdHopital($idHopital){
    	$querry = 'SELECT * FROM relation WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT)));
        $results = Connexion::getResults();
        return $results;
    }
    
    /**
    * Fonction de recherche de l'id d'un contact local. 
    * 
    * Permet de rechercher l'id d'un contact local.
    * @param idHopital correspond à l'id de l'hôpital.
    * @param idContact correspond à l'id de contact.
    * @return result correspond à l'ensemble idContact, id Hopital rechercher.
    */
    public static function rechercherContactLocalInHopital($idHopital,$idContact){
    	$querry = 'SELECT * FROM relation WHERE idUtilisateur=:idContact';
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        return $result;
    }

    /**
    * Fonction d'ajout d'une relation. 
    * 
    * Permet d'jouter une reltion entre l'id d'un contact local et l'id d'un hôpital.
    * @param idHopital correspond à l'id de l'hôpital.
    * @param idContact correspond à l'id de contact.
    */
    public static function ajouterRelation($idHopital, $idContact){
        $querry = 'INSERT INTO relation (idHopital, idUtilisateur) VALUES (:idHopital, :idContact)';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT),
                                                ':idContact'=>array($idContact,PDO::PARAM_INT)));
    }

    /**
    * Fonction de supprimer une relation. 
    * 
    * Permet de supprimer relation entre un contact local et un hôpital.
    * @param idHopital correspond à l'id de l'hôpital.
    * @param idContact correspond à l'id de contact.
    */
    public static function supprimerRelation($idHopital,$idContact){
         $querry = 'DELETE FROM relation WHERE idHopital = :idHopital AND idUtilisateur = :idUtilisateur';
         Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT),
                                                ':idUtilisateur'=>array($idContact,PDO::PARAM_INT)));
    }

    /**
    * Fonction de sppression de toutes les relations d'un hôpital. 
    * 
    * Permet de supprimer l'ensemble des relations lorsque l'on supprime un hôpital.
    * @param idHopital correspond à l'id de l'hôpital.
    */
    public static function supprimerRelationForHopital($idHopital){
        $querry = 'DELETE FROM relation WHERE idHopital = :idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT)));
    }

    /**
    * Fonction de sppression de toutes les relations d'un contact. 
    * 
    * Permet de supprimer l'ensemble des relations lorsque l'on supprime un contact.
    * @param idContact correspond à l'id de contact.
    */
    public static function supprimerRelationForContact($idContact){
        $querry = 'DELETE FROM relation WHERE idUtilisateur = :idUtilisateur';
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($idContact,PDO::PARAM_INT)));
    }
}