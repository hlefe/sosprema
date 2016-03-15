<?php

/**
* Classe hopital
*
* Métier de hopital
* @package metier
*/
class hopital {

    private $idHopital;
    private $nomHopital; 
    private $idAdresse;
    private $service;
    private $nbLits;
    private $nbPremaParAn;
    private $cafeParent;
    private $parkingPayant;
    private $convention;
    private $visiteBenevole;
    private $listeContactLocal;
    private $listeContactHopital;

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

        foreach($param as $key=>$value){
            $this->$key = $value;
        }
    }
}

