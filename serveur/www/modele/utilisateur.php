<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utilisateur
 *
 * @author Nico
 */
class utilisateur {

    private $userId;
    private $email;
    private $nom;
    private $prenom;
    private $mot_de_passe;
    private $adresse;
    private $id_groupe;
    private $avatar;
    private $telephones;

    public function __get($property) {
        if ('userId' == $property) {
            return $this->userId;
        } elseif ('email' == $property) {
            return $this->email;
        } elseif ('nom' == $property) {
            return $this->nom;
        } elseif ('prenom' == $property) {
            return $this->prenom;
        } elseif ('adresse' == $property) {
            return $this->adresse;
        } elseif ('id_groupe' == $property) {
            return $this->id_groupe;
        } elseif ('avatar' == $property) {
            return $this->avatar;
        } elseif ('telephones' == $property) {
            return $this->telephones;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __set($property, $value) {
        if ('email' == $property) {
            $this->email = $value;
        } elseif ('nom' == $property) {
            $this->nom = $value;
        } elseif ('prenom' == $property) {
            $this->prenom = $value;
        } elseif ('mot_de_passe' == $property) {
            $this->mot_de_passe = $value;
        } elseif ('adresse' == $property) {
            $this->adresse = $value;
        } elseif ('id_groupe' === $property) {
            $this->id_groupe = $value;
        } elseif ('avatar' === $property) {
            $this->avatar = $value;
        } elseif ('telephones' === $property) {
            $this->telephones[] = $value;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __construct($param) {

        foreach ($param as $key=>$value){
            if ('email' == $key) {
                $this->email = $value;
            } elseif ('nom' == $key) {
                $this->nom = $value;
            } elseif ('prenom' == $key) {
                $this->prenom = $value;
            } elseif ('mot_de_passe' == $key) {
                $this->mot_de_passe = $value;
            } elseif ('num_rue' == $key) {
                $this->adresse->num_rue = $value;
            } elseif ('nom_rue' == $key) {
                $this->adresse->nom_rue = $value;
            } elseif ('code_postal' == $key) {
                $this->adresse->code_postal = $value;
            } elseif ('ville' == $key) {
                $this->adresse->ville = $value;
            } elseif ('id_groupe' === $key) {
                $this->id_groupe = $value;
            } elseif ('avatar' === $key) {
                $this->avatar = $value;
            } elseif ('telephones' === $key) {
                $this->telephones[] = $value;
            }
        }
    }
}

