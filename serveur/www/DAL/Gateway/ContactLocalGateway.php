<?php

class ContactLocalGateway {
    
    public static function ajouterContactLocal($idUtilisateur, $idHopital, $datePremierEngagement, $dateRenouvellement, $dateSenior, $visitesBenevoles, $conventionHopital, $conventionCAMSP, $conventionPMI, $charteVisiteur)
    {
        $querry = 'INSERT INTO contactlocal (idUtilisateur, idHopital, datePremierEngagement, dateRenouvellement, dateSenior, visitesBenevoles, conventionHopital, conventionCAMSP, conventionPMI, charteVisiteur)
                  VALUES (:idUtilisateur, :idHopital, :datePremierEngagement, :dateRenouvellement, :dateSenior, :visitesBenevoles, :conventionHopital, :conventionCAMSP, :conventionPMI, :charteVisiteur)';
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($idUtilisateur,PDO::PARAM_INT),
                                                ':idHopital'=>array($idHopital,PDO::PARAM_INT), 
                                                ':datePremierEngagement'=>array($datePremierEngagement,PDO::PARAM_STR), 
                                                ':dateRenouvellement'=>array($dateRenouvellement,PDO::PARAM_STR), 
                                                ':dateSenior'=>array($dateSenior,PDO::PARAM_STR), 
                                                ':visitesBenevoles'=>array($visitesBenevoles,PDO::PARAM_BOOL), 
                                                ':conventionHopital'=>array($conventionHopital,PDO::PARAM_BOOL), 
                                                ':conventionCAMSP'=>array($conventionCAMSP,PDO::PARAM_BOOL), 
                                                ':conventionPMI'=>array($conventionPMI,PDO::PARAM_BOOL), 
                                                ':charteVisiteur'=>array($charteVisiteur,PDO::PARAM_BOOL)));
    }
    
    public static function rechercherContacLocal($idUtilisateur){
        $querry = 'SELECT * FROM contactlocal WHERE idUtilisateur=:idUtilisateur';
        Connexion::executeQuerry($querry, array('idUtilisateur'=>array($idUtilisateur,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        return $result;
    }
    
    public static function getAll(){
        $querry = 'SELECT * FROM contactlocal';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
}
