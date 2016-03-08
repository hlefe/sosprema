<?php

class ContactHopitalGateway {
    
    public static function ajouterContactHopital($idHopital, $nom, $prenom, $profession)
    {
        $querry = 'INSERT INTO contacthopital (idHopital, nom, prenom, profession)
                  VALUES (:idHopital, :nom, :prenom, :profession)';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT), 
                                                ':nom'=>array($nom,PDO::PARAM_STR), 
                                                ':prenom'=>array($prenom,PDO::PARAM_STR), 
                                                ':profession'=>array($profession,PDO::PARAM_STR)));
    }
    
    public static function rechercherContactHopital($idContactHopital){
        $querry = 'SELECT * FROM contacthopital WHERE idContactHopital=:idContactHopital';
        Connexion::executeQuerry($querry, array('idContactHopital'=>array($idContactHopital,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if($result==false){
            return false;
        }
        return new ContacHopital($result);
    }
    
    public static function getAll(){
        $querry = 'SELECT * FROM contacthopital';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
    
    public static function supprimerContact($idContactHopital){
        $querry = 'DELETE FROM contacthopital WHERE idContactHopital = :idContactHopital';
        Connexion::executeQuerry($querry, array(':idContactHopital'=>array($idContactHopital, PDO::PARAM_INT)));
    }
    
    public static function modifierContact($idContactHopital, $idHopital, $nom, $prenom, $profession)
    {
        $querry = 'UPDATE contacthopital SET  idHopital = :idHopital,
                                            nom = :nom,
                                            prenom = :prenom,
                                            profession = :profession
                                     WHERE  idContactHopital = :idContactHopital';
        
        Connexion::executeQuerry($querry, array(':idContactHopital'=>array($idContactHopital, PDO::PARAM_INT),
                                                ':idHopital'=>array($idHopital, PDO::PARAM_INT),
                                                ':nom'=>array($nom, PDO::PARAM_STR),
                                                ':prenom'=>array($prenom, PDO::PARAM_STR),
                                                ':profession'=>array($profession, PDO::PARAM_STR)));
    }

    public static function rechercherContactHopitalByHopital($idHopital){
        $querry = 'SELECT * FROM contacthopital WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array('idHopital'=>array($idHopital,PDO::PARAM_INT)));
        $result = Connexion::getResults();
        if($result==false){
            return false;
        }
        foreach ($result as $contacthopital) {
            $contactHopital = new ContacHopital($contacthopital);
        }
        return $contacthopital;
    }
}