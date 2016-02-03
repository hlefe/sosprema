<?php

class NiveauGateway
{
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

    public static function rechercheridNiveau($nom){
        $querry = 'SELECT * FROM niveau WHERE nom=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $idNiveau = $result['idNiveau'];
        return $idNiveau;
    }

    public static function getAll(){
    	$querry = 'SELECT * FROM niveau';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}