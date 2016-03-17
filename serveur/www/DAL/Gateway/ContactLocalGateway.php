<?php
/**
* Classe ContactLocalGateway
*
* Gateway de ContactLocal (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class ContactLocalGateway {

    /**
    * Fonction d'ajout un contact local.
    * 
    * Permet d'ajouter un contact local.
    * @param idUtilisateur correspond à l'id de l'utilisateur qui est devenu un contact local.
    * @param datePremierEngagement correspond à la date de première engagement du contact local.
    * @param dateRenouvellement correspond à la date de renouvellement de contrat du contac hôpital.
    * @param dateSenior correspond à la date senior du contact hôpital.
    * @param visitesBenevoles permet de savoir si le contact local fait des visites bénévoles ou non.
    * @param conventionHopital permet de savoir si le contact local possède une convention hôpital.
    * @param conventionCAMSP permet de savoir si le contact local possède une convention CAMSP.
    * @param conventionPMI permet de savoir si le contact local possède une convention PMI.
    * @param charteVisiteur permet de savoir si le contact local possède une charte visiteur.
    */
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
    
    /**
    * Fonction de recherche d'un contact local par l'id utilisateur.
    * 
    * Permet de rechercher un contact local par l'id de l'utilisateur.
    * @param idUtilisateur correspond à l'id de l'utilisateur qui est devenu un contact local.
    * @return ContactLocal correspond aux informations du contact local.
    */
    public static function rechercherContactLocalByIdUser($idUtilisateur){
        $querry = 'SELECT * FROM contactlocal WHERE idUtilisateur=:idUtilisateur';
        Connexion::executeQuerry($querry, array('idUtilisateur'=>array($idUtilisateur,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if($result==false){
            return false;
        }
        return new ContactLocal($result);
    }

    /**
    * Fonction de recherche d'un contact local par l'id du contact.
    * 
    * Permet de rechercher un contact local par l'id de contact.
    * @param idcontact correspond à l'id du contact rechercher.
    * @return ContactLocal correspond aux informations du contact local recherché.
    */
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
    
    /**
    * Fonction de récupération de l'ensemble des contacts locaux.
    * 
    * Permet de récupération de l'ensemble des contacts locaux triés par nom et prénom.
    * @return results correspond à l'ensemble des id utilisateur qui sont contacts locaux triés de façon à pouvoir récupérer les utilisateurs triés par nom et prénom.
    */
    public static function getAll(){
        //ancienne version non triè
        //$querry = 'SELECT * FROM contactlocal';
        //nouvelle version triè par nom et prènom;
        $querry ='SELECT c.idUtilisateur, idContact FROM contactlocal c, utilisateur u WHERE c.idUtilisateur = u.idUtilisateur ORDER BY nom, prenom;';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
    
    /**
    * Fonction de supression d'un contact local par l'id du contact.
    * 
    * Permet de supprimer un contact local par l'id de contact.
    * @param idcontact correspond à l'id du contact recherché.
    * @return ContactLocal correspond aux informations du contact local recherché.
    */
    public static function supprimerContact($idContact){
        $querry = 'DELETE FROM contactlocal WHERE idContact = :idContact';
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact, PDO::PARAM_INT)));
    }
    
    /**
    * Fonction de modifier un contact local.
    * 
    * Permet de modifier un contact local.
    * @param idcontact correspond à l'id du contact.
    * @param datePremierEngagement correspond à la date de première engagement du contact local.
    * @param dateRenouvellement correspond à la date de renouvellement de contrat du contact hôpital.
    * @param dateSenior correspond à la date senior du contact hopital.
    * @param visitesBenevoles permet de savoir si le contact local fait des visites bénévoles ou non.
    * @param conventionHopital permet de savoir si le contact local possède une convention hôpital.
    * @param conventionCAMSP permet de savoir si le contact local possède une convention CAMSP.
    * @param conventionPMI permet de savoir si le contact local possède une convention PMI.
    * @param charteVisiteur permet de savoir si le contact local possède une charte visiteur.
    * @return ContactLocal correspond aux informations du contact local rechercher.
    */
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
