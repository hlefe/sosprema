<?php
/**
* Classe ContactHopitalGateway
*
* Gateway de ContactHopital (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class ContactHopitalGateway {
    
    /**
    * Fonction d'ajout d'un contact hopital.
    * 
    * Permet d'ajouter un contact hopital.
    * @param idHopital correspond à l'id de l'hôpital à laquelle il appartient.
    * @param nom correspond au nom du contact de l'hôpital.
    * @param prenom correspond au prenom du contact de l'hôpital.
    * @param numero au numéro du contact de l'hôpital.
    * @return result retourne le résultat de la recherche de l'adresse.
    */
    public static function ajouterContactHopital($idHopital, $nom, $prenom, $profession,$numero)
    {
        $querry = 'INSERT INTO contacthopital (idHopital, nom, prenom, profession, numero)
                  VALUES (:idHopital, :nom, :prenom, :profession, :numero)';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT), 
                                                ':nom'=>array($nom,PDO::PARAM_STR), 
                                                ':prenom'=>array($prenom,PDO::PARAM_STR), 
                                                ':profession'=>array($profession,PDO::PARAM_STR),
                                                ':numero'=>array($numero,PDO::PARAM_STR)));
    }
    
    /**
    * Fonction de recherche de contact hopital.
    * 
    * Permet de rechercher un contact hôpital grâce à son id.
    * @param idContactHopital correspond à l'id du contact local rechercher.
    * @return ContactHopital correspondant au contact hopital rechercher.
    */
    public static function rechercherContactHopital($idContactHopital){
        $querry = 'SELECT * FROM contacthopital WHERE idContactHopital=:idContactHopital';
        Connexion::executeQuerry($querry, array('idContactHopital'=>array($idContactHopital,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if($result==false){
            return false;
        }
        return new ContacHopital($result);
    }
    
    /**
    * Fonction de récupération de l'ensemble des contact hôpital.
    * 
    * Permet récupération de l'ensemble des contact hôpital.
    * @return result ensemble des lgne récupérer dans la base de données.
    */
    public static function getAll(){
        $querry = 'SELECT * FROM contacthopital';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
    
    /**
    * Fonction se suppression d'un contact hopital.
    * 
    * Permet de rechercher un contact hôpital grâce à son id.
    * @param idContactHopital correspond à l'id du contact local rechercher.
    * @return ContactHopital correspondant au contact hopital rechercher.
    */
    public static function supprimerContact($idContactHopital){
        $querry = 'DELETE FROM contacthopital WHERE idContactHopital = :idContactHopital';
        Connexion::executeQuerry($querry, array(':idContactHopital'=>array($idContactHopital, PDO::PARAM_INT)));
    }
    
    /**
    * Fonction de modification d'un contact hopital.
    * 
    * Permet de modification d'un contact hôpital, n'est pas utiliser.
    * @param idContactHopital correspond à l'id du contact local rechercher.
    * @param idHopital correspond à l'id de l'hopital auquel est lié le contact hopital.
    * @param nom correspond au nom du contact de l'hôpital.
    * @param prenom correspond au prenom du contact de l'hôpital.
    * @param numero au numéro du contact de l'hôpital.
    * @return ContactHopital correspondant au contact hopital rechercher.
    */
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

    /**
    * Fonction de recherche des contacts hôpital liè à un hôpital.
    * 
    * Permet de modification d'un contact hôpital, n'est pas utiliser.
    * @param idHopital correspond à l'id de l'hopital auquel sont lié les contacts hôpital.
    * @return ContactsHopital correspondant à l'ensemble des contacts hopital liè à l'hôpital.
    */
    public static function rechercherContactHopitalByHopital($idHopital){
        $querry = 'SELECT * FROM contacthopital WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array('idHopital'=>array($idHopital,PDO::PARAM_INT)));
        $result = Connexion::getResults();
        if($result==false){
            return false;
        }
        foreach ($result as $contacthopital) {
            $contactsHopital[] = new ContactHopital($contacthopital);
        }
        return $contactsHopital;
    }
}