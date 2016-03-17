<?php
/**
* Classe TelephoneGateway
*
* Gateway de Telephone (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class TelephoneGateway {
    
    /**
    * Fonction de recherche de l'ensemble des téléphones. 
    * 
    * Permet de rechercher l'ensemble des téléphones d'un utilisateur.
    * @param idHopital correspond à l'id de l'hôpital.
    * @return telephones l'ensemble des téléphones d'un utilisateur.
    */
    public static function rechercheTelephoneUtilisateur($idContact)
    {
        $querry = 'SELECT * FROM telephone WHERE idContact=:idContact';
        Connexion::executeQuerry($querry, array(':idContact'=>array($idContact,PDO::PARAM_INT)));
        $result = Connexion::getResults();
        if($result == false){
            return false;
        }
        foreach ($result as $key => $value) {
            $telephones[] = new telephone($value['idTelephone'],$value['intitule'],$value['numero']);
        }
        return $telephones;
    }

    /**
    * Fonction d'ajout d'un téléphones. 
    * 
    * Permet d'ajouter un téléphone à un utilisateur.
    * @param intitule correspond à l'intitulé du téléphone.
    * @param numero correspond au numero de téléphone à ajouter.
    * @param userId correspond à l'id de l'utilisateur du numéro de téléphone.
    */
    public static function ajouterTelephone($intitule,$numero,$userId){
        $querry = 'INSERT INTO telephone (intitule, numero, idContact) VALUES (:intitule, :numero, :idContact)';
        Connexion::executeQuerry($querry, array(':intitule'=>array($intitule,PDO::PARAM_STR),
                                                ':numero'=>array($numero,PDO::PARAM_INT), 
                                                ':idContact'=>array($userId,PDO::PARAM_STR)));
    }

    /**
    * Fonction de modification d'un téléphones. 
    * 
    * Permet de modifier un téléphone à un utilisateur.
    * @param idTelephone correspond à l'id du téléphone à modifier.
    * @param intitule correspond à l'intitule du téléphone.
    * @param numero correspond au numero de téléphone à modifier.
    */
    public static function modifierTelephone($idTelephone, $intitule, $numero){
        $querry = 'UPDATE telephone SET  intitule = :intitule,
                                            numero = :numero
                                     WHERE  idTelephone = :idTelephone';
        
        Connexion::executeQuerry($querry, array(':idTelephone'=>array($idTelephone, PDO::PARAM_INT),
                                                ':intitule'=>array($intitule, PDO::PARAM_INT),
                                                ':numero'=>array($numero, PDO::PARAM_INT)));
    }

    /**
    * Fonction de supression d'un téléphones. 
    * 
    * Permet de supprimer le téléphone d'un utilisateur.
    * @param idTelephone correspond à l'id du téléphone à modifier.
    * @param intitule correspond à l'intitule du téléphone.
    * @param numero correspond au numero de téléphone à modifier.
    */
    public static function supprimerTelephone($idTelephone){
        $querry = 'DELETE FROM telephone WHERE idTelephone = :idTelephone';
        Connexion::executeQuerry($querry, array(':idTelephone'=>array($idTelephone, PDO::PARAM_INT)));
    }
}