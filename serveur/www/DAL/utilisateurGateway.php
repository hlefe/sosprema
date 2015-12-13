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

    public function rechercheUtilisateurConnexion($email, $password)
    {
        try {
            $querry = 'SELECT * FROM utilisateur WHERE email=:email AND mot_de_passe=:password';
            $this->bd->executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR),
                                                    ':password'=>array($password,PDO::PARAM_STR)));
            $result = $this->bd->getResult();
            if ($result == false){
                return false;
            }
            $utilisateur = new utilisateur($result);
            return $utilisateur;
        } catch (PDOException $ex) {
            echo $ex;            
        }
        
        
    }

    public function rechercheUtilisateurNom($nom)
    {        
        $querry = 'SELECT * FROM utilisateur WHERE nom=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_STR)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }

        return $utilisateur = new utilisateur($result);
    }

    public function insererUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar){
        $querry = 'INSERT INTO utilisateur (email, nom, prenom, mot_de_passe, num_rue, nom_rue, code_postal, ville, id_niveau_utilisateur, avatar) VALUES (:email, :nom, :prenom, :mot_de_passe, :num_rue, :nom_rue, :code_postal, :ville, :id_niveau_utilisateur, :avatar)';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_STR),
                                                ':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':email'=>array($email,PDO::PARAM_STR),
                                                ':mot_de_passe'=>array($mot_de_passe,PDO::PARAM_STR),
                                                ':num_rue'=>array($num_rue,PDO::PARAM_INT),
                                                ':nom_rue'=>array($nom_rue,PDO::PARAM_STR),
                                                ':code_postal'=>array($code_postal,PDO::PARAM_INT),
                                                ':ville'=>array($ville,PDO::PARAM_STR),
                                                ':id_niveau_utilisateur'=>array($id_niveau_utilisateur,PDO::PARAM_STR),
                                                ':avatar'=>array($avatar,PDO::PARAM_STR)));
        
        }

    public function supprimerUtilisateur($email){        
        $querry = 'DELETE FROM utilisateur WHERE email=:email';
        $this->bd->executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
    }

    public function afficherToutUtilisateur(){        
        $querry = 'SELECT * FROM utilisateur';
        $this->bd->executeQuerry($querry, NULL);
        $result = $this->bd->getResults();
        if ($result == false){
            return false;
        }
    }
}