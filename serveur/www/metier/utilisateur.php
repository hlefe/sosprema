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
    private $num_rue;
    private $nom_rue;
    private $code_postal;
    private $ville;
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
        } elseif ('num_rue' == $property) {
            return $this->num_rue;
        } elseif ('nom_rue' == $property) {
            return $this->nom_rue;
        } elseif ('code_postal' == $property) {
            return $this->code_postal;
        } elseif ('ville' == $property) {
            return $this->ville;
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
        } elseif ('num_rue' == $property) {
            $this->num_rue = $value;
        } elseif ('nom_rue' == $property) {
            $this->nom_rue = $value;
        } elseif ('code_postal' == $property) {
            $this->code_postal = $value;
        } elseif ('ville' == $property) {
            $this->ville = $value;
        }  elseif ('id_groupe' === $property) {
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
            } elseif ('id_utilisateur' == $key) {
                $this->userId = $value;
            } elseif ('nom' == $key) {
                $this->nom = $value;
            } elseif ('prenom' == $key) {
                $this->prenom = $value;
            } elseif ('mot_de_passe' == $key) {
                $this->mot_de_passe = $value;
            } elseif ('num_rue' == $key) {
                $this->num_rue = $value;
            } elseif ('nom_rue' == $key) {
                $this->nom_rue = $value;
            } elseif ('code_postal' == $key) {
                $this->code_postal = $value;
            } elseif ('ville' == $key) {
                $this->ville = $value;
            } elseif ('id_niveau_utilisateur' == $key) {
                $this->id_groupe = $value;
            } elseif ('avatar' == $key) {
                $this->avatar = $value;
            }
        }
    }

    public function verifierMotDePasse($mot_de_passe){
        if($this->mot_de_passe == $mot_de_passe){
            return true;
        }
        return false;
    }
}

