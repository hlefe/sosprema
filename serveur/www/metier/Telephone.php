<?php
/**
* Classe telephone
*
* Métier de telephone
* @package metier
*/
class telephone {

    private $idTelephone;
    private $type;
    private $numero;

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
        $this->$property=$value;
    }

    /**
    * Fonction de construction de l'objet. 
    * 
    * Permet de l'objet avec les bonnes valeurs.
    * @param param correspond au tableau avec comme clef les propriétés et comme valeur la valeur de la propriétés.
    */
    public function __construct($idTelephone,$type, $numero) {
        $this->idTelephone = $idTelephone;
        $this->type = $type;
        $this->numero = $numero;
    }

}
