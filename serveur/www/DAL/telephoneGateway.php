<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utilisateurGateway
 *
 * @author Nico
 */


class telephoneGateway {
    
    private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function rechercheTelephoneUtilisateur($id_utilisateur)
    {
        $querry = 'SELECT * FROM telephone WHERE id_utilisateur=:id_utilisateur';
        $this->bd->executeQuerry($querry, array(':id_utilisateur'=>array($id_utilisateur,PDO::PARAM_STR)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        foreach ($result as $key => $value) {
            $telephones = new telephone($value);
        }
        return $telephones;
        
    }
}
