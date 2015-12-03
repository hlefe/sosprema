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


class utilisateurGateway {
    
    private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function rechercheUtilisateurConnexion($email, $password) {
        
        $query = 'SELECT * FROM utilisateur WHERE email=:email AND mot_de_passe=:password';
        $this->bd->executeQuerry($querry, array(
                                            ':email'=>array($email,PDO::PARAM_STR),
                                            ':password'=>array($password,PDO::PARAM_STR)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }

        $query = 'SELECT * FROM telephone WHERE id_utilisateur_tel=:id_utilisateur';
        $this->bd->executeQuerry($querry, array(':id_utilisateur'=>array($result['id_utilisateur'],PDO::PARAM_STR)));
        $result += $this->bd->getResults();
        return new utilisateur($result);
    }

    public function rechercheUtilisateurNom($nom)
    {        
        $query = 'SELECT * FROM utilisateur WHERE nom=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_STR)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }

        $query = 'SELECT * FROM telephone WHERE id_utilisateur_tel=:id_utilisateur';
        $this->bd->executeQuerry($querry, array(':nom'=>array($result['id_utilisateur'],PDO::PARAM_STR)));
        $result += $smtp->fetchall();

        return $utilisateur = new utilisateur($result);
    }

}
