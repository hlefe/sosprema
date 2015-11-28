<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adresse
 *
 * @author Nico
 */
class adresse {

    private $num_rue;
    private $nom_rue;
    private $code_postal;
    private $ville;

    public function __get($property) {
        if ('num_rue' == $property) {
            return $this->num_rue;
        } elseif ('nom_rue' == $property) {
            return $this->nom_rue;
        } elseif ('code_postal' == $property) {
            return $this->code_postal;
        } elseif ('ville' == $property) {
            return $this->ville;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __set($property, $value) {
        if ('num_rue' == $property) {
            $this->num_rue = $value;
        } elseif ('nom_rue' == $property) {
            $this->nom_rue = $value;
        } elseif ('code_postal' == $property) {
            $this->code_postal = $value;
        } elseif ('ville' == $property) {
            $this->ville = $value;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __construc($numRue, $nomRue, $codePostal, $ville) {
        $this->num_rue = $numRue;
        $this->nom_rue = $nomRue;
        $this->code_postal = $codePostal;
        $this->vile = $ville;
    }

}
