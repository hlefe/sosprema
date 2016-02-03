<?php
//Métier de l'utilisateur
class utilisateur {

    private $idUtilisateur;
    private $email; 
    private $emailPerso;
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $nomRue;
    private $numRue;
    private $codePostal;
    private $profession;
    private $divers;
    private $avatar;
    private $idNiveau;
    private $idFamille;
    private $nomVille;
    private $nomDepartement;
    private $nomRegion;
    private $motDePasse;

//Getter
    public function __get($property) {
        //Utilisation d'une variable dynamique   
        return $this->$property;
    }

//Setter
    public function __set($property, $value) {
        //Utilisation d'une variable dynamique 
        $this->$property = $value;
    }

//Constructeur
    public function __construct($param) {
        foreach ($param as $key=>$value){
            //Utilisation d'une variable dynamique
            $this->$key = $value;
        }
    }

// Méthode pour la vérification du mot de passe
    public function verifierMotDePasse($motDePasse){
        if($this->motDePasse == $motDePasse){
            return true;
        }
        return false;
    }
}