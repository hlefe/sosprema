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
        } if ('email' == $property) {
            return $this->email;
        } if ('nom' == $property) {
            return $this->nom;
        } if ('prenom' == $property) {
            return $this->prenom;
        } if ('adresse' == $property) {
            return $this->adresse;
        } if ('id_groupe' == $property) {
            return $this->id_groupe;
        } if ('avatar' == $property) {
            return $this->avatar;
        } if ('telephones' == $property) {
            return $this->telephones;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __set($property, $value) {
        if ('email' == $property) {
            $this->email = $value;
        } if ('nom' == $property) {
            $this->nom = $value;
        } if ('prenom' == $property) {
            $this->prenom = $value;
        } if ('mot_de_passe' == $property) {
            $this->mot_de_passe = $value;
        } if ('adresse' == $property) {
            $this->adresse = $value;
        } if ('id_groupe' === $property) {
            $this->id_groupe = $value;
        } if ('avatar' === $property) {
            $this->avatar = $value;
        } if ('telephones' === $property) {
            $this->telephones[] = $value;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __construct($param) {

        foreach ($param as $key->$value) {
            if ('email' == $key) {
                $this->email = $value;
            } if ('nom' == $key) {
                $this->nom = $value;
            } if ('prenom' == $key) {
                $this->prenom = $value;
            } if ('mot_de_passe' == $key) {
                $this->mot_de_passe = $value;
            } if ('num_rue' == $key) {
                $this->adresse->num_rue = $value;
            }}if ('nom_rue' == $key) {
                $this->adresse->nom_rue = $value;
            } if ('code_postal' == $key) {
                $this->adresse->code_postal = $value;
            } if ('ville' == $key) {
                $this->adresse->ville = $value;
            } if ('id_groupe' === $key) {
                $this->id_groupe = $value;
            } if ('avatar' === $key) {
                $this->avatar = $value;
            } if ('telephones' === $key) {
                $this->telephones[] = $value;
            } else {
                throw new Exception('Propriété invalide !');
            }
        }
    }

}
