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

    /**
    * Fonction de récupération de la valeur d'une propriété. 
    * 
    * Permet de récupérer la valeur d'une propriété.
    * @param property correspond à la propriété.
    * @return result retourne la valeur de la proprièté demander.
    */
    public function __get($property) {
        return $this->$property;
    }

    /**
    * Fonction de modification de la valeur d'une propriété. 
    * 
    * Permet de récupérer la valeur d'une propriété.
    * @param property correspond à la propriété.
    * @param value correspond à la nouvelle valeur de la propriété.
    */
    public function __set($property, $value) {
        $this->$property = $value;
    }

    /**
    * Fonction de construction de l'objet. 
    * 
    * Permet de l'objet avec les bonnes valeurs.
    * @param param correspond au tableau avec comme clef les propriétés et comme valeur la valeur de la propriétés.
    */
    public function __construct($param) {

        foreach ($param as $key=>$value){
            if($key == 'idUtilisateur'){
                $this->userId = $value;
            }else{
                $this->$key = $value;
            }
        }
    }

    /**
    * Fonction de vérification du mot de passe. 
    * 
    * Permet de vérifier le mot de passe de l'utilisateur.
    * @param motDePasse correspond au mot de passe à vérifier.
    */
    public function verifierMotDePasse($motDePasse){
        if($this->motDePasse == $motDePasse){
            return true;
        }
        return false;
    }
}

