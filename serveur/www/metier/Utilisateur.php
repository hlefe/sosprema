<?php

/**
* Classe utilisateur
*
* Métier de utilisateur
* @package metier
*/
class utilisateur {

    private $userId;
    private $email; 
    private $emailPerso;
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $profession;
    private $divers;
    private $avatar;
    private $idNiveau;
    private $motDePasse;
    private $idAdresse;
    private $adresse;
    private $telephones;
    private $contactLocal;

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __construct($param) {

        foreach ($param as $key=>$value){
            if($key == 'idUtilisateur'){
                $this->userId = $value;
            }else{
                $this->$key = $value;
            }
        }
    }

    public function verifierMotDePasse($motDePasse){
        if($this->motDePasse == $motDePasse){
            return true;
        }
        return false;
    }
}

