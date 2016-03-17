<?php
/**
* Classe EnfantGateway
*
* Gateway de Enfant (intéragit avec cette table en utilisant PDO)
* Elle n'est pas utiliser par manque de temp elle doit permettre de rajouter les enfants des contact locaux.
* @package DAL
* @subpackage gateway
*/
class EnfantGateway {
    

    /**
    * Fonction d'ajout d'un enfant pour un contact local. 
    * 
    * Permet d'ajouter un enfant pour un contact local.
    * @param prenom correspond au prenom de l'enfant à ajouter.
    * @param dateDeNaissance correspond à la date de naissance de l'enfant.
    * @param termeNaissance correspond au terme de la naissance de l'enfant si prema ou non.
    * @param idContact correspond à l'id du contact à qui appartient l'enfant.
    */
    public static function ajouterEnfant($prenom, $dateNaissance, $termeNaissance, $idContact){
        $querry = 'INSERT INTO enfant (prenom, dateNaissance, termeNaissance, idContact)
                  VALUES (:prenom, :dateNaissance, :termeNaissance, :idContact)';
        
        Connexion::executeQuerry($querry, array(':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':dateNaissance'=>array($dateNaissance,PDO::PARAM_STR),
                                                ':termeNaissance'=>array($termeNaissance,PDO::PARAM_STR),
                                                ':idContact'=>array($idContact,PDO::PARAM_INT)));       
    }
    
    /**
    * Fonction de recherche d'un enfant pour un contact local. 
    * 
    * Permet de rechercher un enfant pour un contact local dont on possède l'id.
    * @param idContact correspond à l'id du contact à qui appartient l'enfant.
    * @return results est l'ensemble des résultats du contact local.
    */
    public static function rechercherEnfants($idContact){
        $querry = 'SELECT * FROM enfant WHERE idContact=:idContact';
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact,PDO::PARAM_STR)));
        $results = Connexion::getResults();
        return $results;
    }
    
    /**
    * Fonction de suppression d'un enfant. 
    * 
    * Permet de supprimer un enfant pour un contact local.
    * @param idEnfant correspond à l'id de l'enfant.
    */
    public static function supprimerEnfant($idEnfant){
        $querry = 'DELETE FROM enfant WHERE idEnfant=:idEnfant';
        Connexion::executeQuerry($querry, array(':idEnfant'=>array($idEnfant,PDO::PARAM_INT)));
    }
    
    /**
    * Fonction de modification d'un enfant. 
    * 
    * Permet de modifier un enfant.
    * @param idEnfant correspond à l'id de l'enfant.
    * @param prenom correspond au prenom de l'enfant à ajouter.
    * @param dateDeNaissance correspond à la date de naissance de l'enfant.
    * @param termeNaissance correspond à la terme de la naissance de l'enfant si prema ou non.
    */
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
