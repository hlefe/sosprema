<?php
/**
* Classe RelationGateway
*
* Gateway de Relation (intéragit avec cette table en utilisant PDO)
*/
class RelationGateway
{
    public static function rechercherContactLocalByIdHopital($idHopital){
    	$querry = 'SELECT * FROM relation WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT)));
        $results = Connexion::getResults();
        return $results;
    }
    
    public static function rechercherContactLocalInHopital($idHopital,$idContact){
    	$querry = 'SELECT * FROM relation WHERE idUtilisateur=:idContact';
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        return $result;
    }

    public static function ajouterRelation($idHopital, $idContact){
        $querry = 'INSERT INTO relation (idHopital, idUtilisateur) VALUES (:idHopital, :idContact)';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT),
                                                ':idContact'=>array($idContact,PDO::PARAM_INT)));
    }

    public static function supprimerRelation($idHopital,$idContact){
         $querry = 'DELETE FROM relation WHERE idHopital = :idHopital AND idUtilisateur = :idUtilisateur';
         Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT),
                                                ':idUtilisateur'=>array($idContact,PDO::PARAM_INT)));
    }

    public static function supprimerRelationForHopital($idHopital){
        $querry = 'DELETE FROM relation WHERE idHopital = :idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT)));
    }

    public static function supprimerRelationForContact($idContact){
        $querry = 'DELETE FROM relation WHERE idUtilisateur = :idUtilisateur';
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($idContact,PDO::PARAM_INT)));
    }
}