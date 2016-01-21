<?php

/*
 * To change this license header; choose License Headers in Project Properties.
 * To change this template file; choose Tools | Templates
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
    private $emailPerso;
    private $nom;
    private $prenom;
    private $motDePasse;
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

    public function __get($property) {
        if ('userId' == $property) {
            return $this->userId;
        } elseif ('email' == $property) {
            return $this->email;
        } elseif ('nom' == $property) {
            return $this->nom;
        } elseif ('prenom' == $property) {
            return $this->prenom;
        }elseif ('dateDeNaissance' == $property) {
            return $this->dateDeNaissance;
        } elseif ('numRue' == $property) {
            return $this->numRue;
        } elseif ('nomRue' == $property) {
            return $this->nomRue;
        } elseif ('codePostal' == $property) {
            return $this->codePostal;
        }elseif ('profession' == $property) {
            return $this->profession;
        }elseif ('divers' == $property) {
            return $this->divers;
        }  elseif ('idNiveau' == $property) {
            return $this->idNiveau;
        } elseif ('avatar' == $property) {
            return $this->avatar;
        }elseif ('idFamille' == $property) {
            return $this->idFamille;
        }elseif ('nomRegion' == $property) {
            return $this->nomRegion;
        }elseif ('nomVille' == $property) {
            return $this->nomVille;
        }elseif ('nomDepartement' == $property) {
            return $this->nomDepartement;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __set($property, $value) {
        if ('email' == $property) {
            $this->email = $value;
        } elseif ('motDePasse' == $property) {
            $this->motDePasse = $value;
        } elseif ('userId' == $property) {
            $this->userId = $value;
        } elseif ('nom' == $property) {
            $this->nom  = $value;
        } elseif ('prenom' == $property) {
            $this->prenom  = $value;
        } elseif ('dateDeNaissance' == $property) {
            $this->dateDeNaissance  = $value;
        } elseif ('numRue' == $property) {
            $this->numRue = $value;
        } elseif ('nomRue' == $property) {
            $this->nomRue = $value;
        } elseif ('codePostal' == $property) {
            $this->codePostal = $value;
        }elseif ('profession' == $property) {
            $this->profession = $value;
        }elseif ('divers' == $property) {
            $this->divers = $value;
        }  elseif ('idNiveau' == $property) {
            $this->idNiveau = $value;
        } elseif ('avatar' == $property) {
            $this->avatar = $value;
        }elseif ('idFamille' == $property) {
            $this->idFamille = $value;
        }elseif ('nomRegion' == $property) {
            $this->nomRegion = $value;
        }elseif ('nomVille' == $property) {
            $this->nomVille = $value;
        }elseif ('nomDepartement' == $property) {
            $this->nomDepartement  = $value;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __construct($param) {

        foreach ($param as $key=>$value){
            if ('email' == $key) {
                $this->email = $value;
            } elseif ('motDePasse' == $key) {
                $this->motDePasse = $value;
            } elseif ('idUtilisateur' == $key) {
                $this->userId = $value;
            } elseif ('nom' == $key) {
                $this->nom  = $value;
            } elseif ('prenom' == $key) {
                $this->prenom  = $value;
            }elseif ('dateDeNaissance' == $key) {
                $this->dateDeNaissance  = $value;
            } elseif ('numRue' == $key) {
                $this->numRue = $value;
            } elseif ('nomRue' == $key) {
                $this->nomRue = $value;
            } elseif ('codePostal' == $key) {
                $this->codePostal = $value;
            }elseif ('profession' == $key) {
                $this->profession = $value;
            }elseif ('divers' == $key) {
                $this->divers = $value;
            }  elseif ('idNiveau' == $key) {
                $this->idNiveau = $value;
            } elseif ('avatar' == $key) {
                $this->avatar = $value;
            }elseif ('idFamille' == $key) {
                $this->idFamille = $value;
            }elseif ('nomRegion' == $key) {
                $this->nomRegion = $value;
            }elseif ('nomVille' == $key) {
                $this->nomVille = $value;
            }elseif ('nomDepartement' == $key) {
                $this->nomDepartement  = $value;
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

