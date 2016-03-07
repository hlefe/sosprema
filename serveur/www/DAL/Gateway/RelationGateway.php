<?php

class RelationGateway
{
    public static function rechercherContactLocalByIdHopital($idHopital){
    	$querry = 'SELECT * FROM relation WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function ajouterRelation($idHopital, $idContact){
        $querry = 'INSERT INTO relation (idHopital, idUtilisateur) VALUES (:idHopital, :idContact)';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT),
                                                ':idContact'=>array($idContact,PDO::PARAM_INT)));
    }

    public static function supprimerRelation($idHopital,$idContact){
         $querry = 'DELETE FROM telephone WHERE idHopital = :idHopital AND idUtilisateur = :idUtilisateur';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT),
                                                ':idUtilisateur'=>array($idUtilisateur,PDO::PARAM_INT)));
    }

    public static function supprimerRelationForHopital($idHopital){
        $querry = 'DELETE FROM telephone WHERE idHopital = :idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT)));
    }

    public static function supprimerRelationForContact($idContact){
        $querry = 'DELETE FROM telephone WHERE idUtilisateur = :idUtilisateur';
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($idUtilisateur,PDO::PARAM_INT)));
    }
}