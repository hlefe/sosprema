<?php
/**
* Classe ContactLocalGateway
*
* Gateway de ContactLocal (intéragit avec cette table en utilisant PDO)
*/
class ContactLocalGateway {
    
    public static function ajouterContactLocal($idUtilisateur, $datePremierEngagement, $dateRenouvellement, $dateSenior, $visitesBenevoles, $conventionHopital, $conventionCAMSP, $conventionPMI, $charteVisiteur)
    {
        $querry = 'INSERT INTO contactlocal (idUtilisateur, datePremierEngagement, dateRenouvellement, dateSenior, visitesBenevoles, conventionHopital, conventionCAMSP, conventionPMI, charteVisiteur)
                  VALUES (:idUtilisateur, :datePremierEngagement, :dateRenouvellement, :dateSenior, :visitesBenevoles, :conventionHopital, :conventionCAMSP, :conventionPMI, :charteVisiteur)';
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($idUtilisateur,PDO::PARAM_INT),
                                                ':datePremierEngagement'=>array($datePremierEngagement,PDO::PARAM_STR), 
                                                ':dateRenouvellement'=>array($dateRenouvellement,PDO::PARAM_STR), 
                                                ':dateSenior'=>array($dateSenior,PDO::PARAM_STR), 
                                                ':visitesBenevoles'=>array($visitesBenevoles,PDO::PARAM_BOOL), 
                                                ':conventionHopital'=>array($conventionHopital,PDO::PARAM_BOOL), 
                                                ':conventionCAMSP'=>array($conventionCAMSP,PDO::PARAM_BOOL), 
                                                ':conventionPMI'=>array($conventionPMI,PDO::PARAM_BOOL), 
                                                ':charteVisiteur'=>array($charteVisiteur,PDO::PARAM_BOOL)));
    }
    
    public static function rechercherContactLocalByIdUser($idUtilisateur){
        $querry = 'SELECT * FROM contactlocal WHERE idUtilisateur=:idUtilisateur';
        Connexion::executeQuerry($querry, array('idUtilisateur'=>array($idUtilisateur,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if($result==false){
            return false;
        }
        return new ContactLocal($result);
    }

    public static function rechercherContactLocalByIdContact($idcontact){
        $querry = 'SELECT * FROM contactlocal WHERE idContact=:idcontact';
        Connexion::executeQuerry($querry, array('idcontact'=>array($idcontact,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if($result==false){
            return false;
        }
        $contact = new ContactLocal($result);
        return $contact;
    }
    
    public static function getAll(){
        //ancienne version non triè
        //$querry = 'SELECT * FROM contactlocal';
        //nouvelle version triè par nom et prènom;
        $querry ='SELECT c.idUtilisateur FROM contactlocal c, utilisateur u WHERE c.idUtilisateur = u.idUtilisateur ORDER BY nom, prenom;';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
    
    public static function supprimerContact($idContact){
        $querry = 'DELETE FROM contactlocal WHERE idContact = :idContact';
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact, PDO::PARAM_INT)));
    }
    
    public static function modifierContact($idContact, $datePremierEngagement, $dateRenouvellement, $dateSenior, $visitesBenevoles, $conventionHopital, $conventionCAMSP, $conventionPMI, $charteVisiteur)
    {
        $querry = 'UPDATE contactlocal SET  datePremierEngagement = :datePremierEngagement,
                                            dateRenouvellement = :dateRenouvellement,
                                            dateSenior = :dateSenior,
                                            visitesBenevoles = :visitesBenevoles,
                                            conventionHopital = :conventionHopital,
                                            conventionCAMSP = :conventionCAMSP,
                                            conventionPMI = :conventionPMI,
                                            charteVisiteur = :charteVisiteur
                                     WHERE  idContact = :idContact';
        
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact, PDO::PARAM_INT),
                                                ':datePremierEngagement'=>array($datePremierEngagement, PDO::PARAM_INT),
                                                ':dateRenouvellement'=>array($dateRenouvellement, PDO::PARAM_INT),
                                                ':dateSenior'=>array($dateSenior, PDO::PARAM_INT),
                                                ':visitesBenevoles'=>array($visitesBenevoles, PDO::PARAM_INT),
                                                ':conventionHopital'=>array($conventionHopital, PDO::PARAM_INT),
                                                ':conventionCAMSP'=>array($conventionCAMSP, PDO::PARAM_INT),
                                                ':conventionPMI'=>array($conventionPMI, PDO::PARAM_INT),
                                                ':charteVisiteur'=>array($charteVisiteur, PDO::PARAM_INT)));
    }
}
