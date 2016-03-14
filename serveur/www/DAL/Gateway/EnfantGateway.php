<?php
/**
* Classe EnfantGateway
*
* Gateway de Enfant (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class EnfantGateway {
    
    public static function ajouterEnfant($prenom, $dateNaissance, $termeNaissance, $idContact){
        $querry = 'INSERT INTO enfant (prenom, dateNaissance, termeNaissance, idContact)
                  VALUES (:prenom, :dateNaissance, :termeNaissance, :idContact)';
        
        Connexion::executeQuerry($querry, array(':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':dateNaissance'=>array($dateNaissance,PDO::PARAM_STR),
                                                ':termeNaissance'=>array($termeNaissance,PDO::PARAM_STR),
                                                ':idContact'=>array($idContact,PDO::PARAM_INT)));       
    }
    
    public static function rechercherEnfants($idContact){
        $querry = 'SELECT * FROM enfant WHERE idContact=:idContact';
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact,PDO::PARAM_STR)));
        $results = Connexion::getResults();
        return $results;
    }
    
    public static function supprimerEnfant($idEnfant){
        $querry = 'DELETE FROM enfant WHERE idEnfant=:idEnfant';
        Connexion::executeQuerry($querry, array(':idEnfant'=>array($idEnfant,PDO::PARAM_INT)));
    }
    
    public static function modifierEnfant($idEnfant, $prenom, $dateNaissance, $termeNaissance){
        $querry = 'UPDATE enfant SET :prenom = prenom,
                                     :dateNaissance = dateNaissance,
                                     :termeNaissance = :termeNaissance
                              WHERE  :idEnfant = idEnfant';
        Connexion::executeQuerry($querry, array(':idEnfant'=>array($idEnfant,PDO::PARAM_INT),
                                                ':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':dateNaissance'=>array($dateNaissance,PDO::PARAM_STR),
                                                ':termeNaissance'=>array($termeNaissance,PDO::PARAM_STR)));
    }
}
