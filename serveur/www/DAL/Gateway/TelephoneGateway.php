<?php

class TelephoneGateway {
    
    public static function rechercheTelephoneUtilisateur($id_utilisateur)
    {
        $querry = 'SELECT * FROM telephone WHERE id_utilisateur=:id_utilisateur';
        Connexion::executeQuerry($querry, array(':id_utilisateur'=>array($id_utilisateur,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        foreach ($result as $key => $value) {
            $telephones = new telephone($value);
        }
        return $telephones;
        
    }
}
