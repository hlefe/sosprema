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

    public static function rechercheUtilisateurConnexion($email, $password) {
        //connexion à la base utiliser classe connexion
        $bd = new PDO('mysql:host=localhost;dbname=sosprema', 'root', 'root');
        $query = 'SELECT * FROM utilisateur WHERE email=:email AND mot_de_passe=:password';
        $smtp = $bd->prepare($query);
        $smtp->bindValue(':email', $email, PDO::PARAM_STR);
        $smtp->bindValue(':password', $password);
        $smtp->execute();
        $result = $smtp->fetch();
        if ($result == false){
            return false;
        }

        $query = 'SELECT * FROM telephone WHERE id_utilisateur_tel=:id_utilisateur';
        $smtp = $bd->prepare($query);
        $smtp->bindValue(':id_utilisateur', $result['id_utilisateur']);
        $smtp->execute();
        $result += $smtp->fetchall();
        return new utilisateur($result);
    }

    public static function rechercheUtilisateurNom($nom) {
        //connexion a la base
        $bd = new PDO();
        $query = 'SELECT * FROM utilisateur WHERE nom=:nom';
        $smtp = $bd->prepare($query);
        $smtp->bindValue(':nom', $nom, PDO::PARAM_STR);
        $smtp->execute();
        $result = $smtp->fetch();
        if ($result == false){
            return false;
        }

        $query = 'SELECT * FROM telephone WHERE id_utilisateur_tel=:id_utilisateur';
        $smtp = $bd->prepare($query);
        $smtp->bindValue(':id_utilisateur', $result['id_utilisateur']);
        $smtp->execute();
        $result += $smtp->fetchall();

        return $utilisateur = new utilisateur($result);
    }

}
