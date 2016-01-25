<?php

class utilisateurGateway {
    
    private $bd;
    
    public function __construct()
    {
        $this->bd = Connexion::getInstance();
    }

    public function rechercheUtilisateurConnexion($email, $password)
    {   
            $querry = 'SELECT * FROM utilisateur WHERE email=:email AND motDePasse=:password';
            $this->bd->executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR),
                                                    ':password'=>array($password,PDO::PARAM_STR)));
            $result = $this->bd->getResult();
            if ($result == false){
                return false;
            }
            $utilisateur = new utilisateur($result);
            return $utilisateur;
    }

    public function rechercheUtilisateurEmail($email)
    {   
            $querry = 'SELECT * FROM utilisateur WHERE email=:email';
            $this->bd->executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR)));
            $result = $this->bd->getResult();
            if ($result == false){
                return false;
            }
            $utilisateur = new utilisateur($result);
            return $utilisateur;       
        
    }

    public function rechercheUtilisateurNom($nom)
    {        
        $querry = 'SELECT * FROM utilisateur WHERE nom=:nom';
        $this->bd->executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_STR)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        return $utilisateur = new utilisateur($result);
    }

    public function rechercheUtilisateurId($id_utilisateur)
    {        
        $querry = 'SELECT * FROM utilisateur WHERE idUtilisateur=:idUtilisateur';
        $this->bd->executeQuerry($querry, array(':idUtilisateur'=>array($id_utilisateur,PDO::PARAM_STR)));
        $result = $this->bd->getResult();
        if ($result == false){
            return false;
        }
        $utilisateur = new utilisateur($result);
        return $utilisateur;
    }

    public function insererUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar=null,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion){
        $querry = 'INSERT INTO utilisateur (email,nom,prenom,motDePasse,dateDeNaissance,nomRue,numRue,
        codePostal,profession,divers,avatar,idNiveau,nomVille,nomDepartement,nomRegion) 
        VALUES (:email,:nom,:prenom,:motDePasse,:dateDeNaissance,:nomRue,:numRue,
        :codePostal,:profession,:divers,:avatar,:idNiveau,:nomVille,:nomDepartement,:nomRegion)';

        $this->bd->executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR),
                                                ':nom'=>array($nom,PDO::PARAM_STR),
                                                ':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':motDePasse'=>array($motDePasse,PDO::PARAM_STR),
                                                ':dateDeNaissance'=>array($dateDeNaissance,PDO::PARAM_STR),
                                                ':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR),
                                                ':codePostal'=>array($codePostal,PDO::PARAM_INT),
                                                ':profession'=>array($profession,PDO::PARAM_INT),
                                                ':divers'=>array($divers,PDO::PARAM_INT),
                                                ':avatar'=>array($avatar,PDO::PARAM_INT),
                                                ':idNiveau'=>array($idNiveau,PDO::PARAM_STR),
                                                ':nomVille'=>array($nomVille,PDO::PARAM_STR),
                                                ':nomDepartement'=>array($nomDepartement,PDO::PARAM_STR),
                                                ':nomRegion'=>array($nomRegion,PDO::PARAM_STR)));
    }

    public function supprimerUtilisateur($email){        
        $querry = 'DELETE FROM utilisateur WHERE email=:email';
        $this->bd->executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR)));
        return true;
    }

    public function afficherToutUtilisateur(){        
        $querry = 'SELECT * FROM utilisateur';
        $this->bd->executeQuerry($querry, array());
        $result = $this->bd->getResults();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public function modifierUtilisateur($id_utilisateur, $email, $nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar=null,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion){
        $querry = 'UPDATE utilisateur   SET     email = :email, 
                                                nom = :nom,
                                                prenom=:prenom,
                                                dateDeNaissance=:dateDeNaissance,
                                                nomRue=:nomRue,
                                                numRue=:numRue,
                                                codePostal=:codePostal,
                                                profession=:profession,
                                                divers=:divers,
                                                avatar=:avatar,
                                                idNiveau=:idNiveau,
                                                nomVille=:nomVille,
                                                nomDepartement=:nomDepartement,
                                                nomRegion=:nomRegion
                                        WHERE   idUtilisateur=:idUtilisateur';
            
            $this->bd->executeQuerry($querry, array(':idUtilisateur'=>array($id_utilisateur,PDO::PARAM_STR),
                                                ':email'=>array($email,PDO::PARAM_STR),
                                                ':nom'=>array($nom,PDO::PARAM_STR),
                                                ':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':dateDeNaissance'=>array($dateDeNaissance,PDO::PARAM_STR),
                                                ':numRue'=>array($numRue,PDO::PARAM_INT),
                                                ':nomRue'=>array($nomRue,PDO::PARAM_STR),
                                                ':codePostal'=>array($codePostal,PDO::PARAM_INT),
                                                ':profession'=>array($profession,PDO::PARAM_STR),
                                                ':divers'=>array($divers,PDO::PARAM_STR),
                                                ':avatar'=>array($avatar,PDO::PARAM_STR),
                                                ':idNiveau'=>array($idNiveau,PDO::PARAM_STR),
                                                ':nomVille'=>array($nomVille,PDO::PARAM_STR),
                                                ':nomDepartement'=>array($nomDepartement,PDO::PARAM_STR),
                                                ':nomRegion'=>array($nomRegion,PDO::PARAM_STR)));
    }

    public function modifierMotDePasse($idUser, $newMDP){
        $querry = 'UPDATE utilisateur SET mot_de_passe=:mot_de_passe WHERE id_utilisateur=:id_utilisateur';
        $this->bd->executeQuerry($querry, array(':mot_de_passe'=>array($newMDP,PDO::PARAM_STR),
                                                ':id_utilisateur'=>array($idUser,PDO::PARAM_STR)));
    }

    public function modifierNiveau($user, $newNiveau){
        $querry = 'UPDATE utilisateur SET id_niveau_utilisateur=:id_niveau_utilisateur WHERE id_utilisateur=:id_utilisateur';
        $this->bd->executeQuerry($querry, array(':id_niveau_utilisateur'=>array($newNiveau,PDO::PARAM_INT),
                                                ':id_utilisateur'=>array($user->userId,PDO::PARAM_STR)));
        $user->id_groupe= $newNiveau;
        return $user;
    }
}