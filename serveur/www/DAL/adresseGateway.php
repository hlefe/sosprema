<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adresseGateway
 *
 * @author Nicolas
 */
class adresseGateway {
    
    private $bd;
    
    public function __construct(){
        $this->bd = new Connexion($dsn, $user, $pswd);
    }
    
    public function rechercherAdresse($id_adresse){
        $querry = 'SELECT * FROM adresse WHERE id_adresse=:id_adresse';
        $this->bd->executeQuerry($querry, array(':id_adresse'=>array($id_adresse, PDO::PARAM_INT)));
        $result = $this->bd->getResult();
        
        if($result==false){
            return false;
        }
        
        $adresse = new adresse($result);
        return $adresse;
    }
    
    public function ajouterAdresse($code_postal, $ville, $region, $departement, $nom_rue, $num_rue){
        $querry = 'INSERT INTO adresse(code_postal, ville, region, departement, nom_rue, num_rue) VALUES (:code_postal, :ville, :region, :departement, :nom_rue, :num_rue)';
        $this->bd->executeQuerry($querry, array(':code_postal'=>array($code_postal, PDO::PARAM_INT),
                                                ':ville'=>array($ville, PDO::PARAM_STR),
                                                ':region'=>array($region, PDO::PARAM_STR),
                                                ':departement'=>array($departement, PDO::PARAM_STR),
                                                ':nom_rue'=>array($nom_rue, PDO::PARAM_STR),
                                                ':num_rue'=>array($num_rue, PDO::PARAM_INT)));
    }
    
    public function supprimerAdresse($id_adresse){
        $querry = 'DELETE FROM adresse WHERE id_adresse=:id_adresse';
        $this->bd->executeQuerry($querry, array(':id_adresse'=>array($id_adresse, PDO::PARAM_INT)));
    }
}
