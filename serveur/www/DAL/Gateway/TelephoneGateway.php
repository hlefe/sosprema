<?php

class TelephoneGateway {
    
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

    public static function ajouterTelephone($intitule,$numero,$userId){
        $querry = 'INSERT INTO telephone (intitule, numero, idContact) VALUES (:intitule, :numero, :idContact)';
        Connexion::executeQuerry($querry, array(':intitule'=>array($intitule,PDO::PARAM_STR),
                                                ':numero'=>array($numero,PDO::PARAM_INT), 
                                                ':idContact'=>array($idContact,PDO::PARAM_STR)));
    }

    public static function modifierTelephone($idTelephone, $intitule, $numero){
        $querry = 'UPDATE telephone SET  intitule = :intitule,
                                            numero = :numero
                                     WHERE  idTelephone = :idTelephone';
        
        Connexion::executeQuerry($querry, array(':idTelephone'=>array($idTelephone, PDO::PARAM_INT),
                                                ':intitule'=>array($intitule, PDO::PARAM_INT),
                                                ':numero'=>array($numero, PDO::PARAM_INT)));
    }

    public static function supprimerTelephone($idTelephone){
        $querry = 'DELETE FROM telephone WHERE idTelephone = :idTelephone';
        Connexion::executeQuerry($querry, array(':idTelephone'=>array($idTelephone, PDO::PARAM_INT)));
    }
}