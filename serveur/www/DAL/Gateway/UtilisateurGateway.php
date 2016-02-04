<?php

class UtilisateurGateway {

    public static function rechercheUtilisateurConnexion($email, $password)
    {   
            $querry = 'SELECT * FROM utilisateur WHERE email=:email AND motDePasse=:password';
            Connexion::executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR),
                                                    ':password'=>array($password,PDO::PARAM_STR)));
            $result = Connexion::getResult();
            if ($result == false){
                return false;
            }
            $utilisateur = new Utilisateur($result);
            return $utilisateur;
    }

    public static function rechercheUtilisateurEmail($email)
    {   
            $querry = 'SELECT * FROM utilisateur WHERE email=:email';
            Connexion::executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR)));
            $result = Connexion::getResult();
            if ($result == false){
                return false;
            }
            $utilisateur = new Utilisateur($result);
            return $utilisateur;       
    }

    public static function rechercheUtilisateurNom($nom)
    {        
        $querry = 'SELECT * FROM utilisateur WHERE nom=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nom,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        return $utilisateur = new Utilisateur($result);
    }

    public static function rechercheUtilisateurId($id_utilisateur)
    {        
        $querry = 'SELECT * FROM utilisateur WHERE idUtilisateur=:idUtilisateur';
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($id_utilisateur,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $utilisateur = new Utilisateur($result);
        return $utilisateur;
    }

    public static function insererUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idFamille,$idAdresse){
        
        $querry = 'INSERT INTO utilisateur (email,nom,prenom,motDePasse,dateDeNaissance,profession,divers,avatar,idNiveau,idAdresse) 
        VALUES (:email,:nom,:prenom,:motDePasse,:dateDeNaissance,:profession,:divers,:avatar,:idNiveau,:idAdresse)';

        Connexion::executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR),
                                                ':nom'=>array($nom,PDO::PARAM_STR),
                                                ':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':motDePasse'=>array($motDePasse,PDO::PARAM_STR),
                                                ':dateDeNaissance'=>array($dateDeNaissance,PDO::PARAM_STR),
                                                ':profession'=>array($profession,PDO::PARAM_STR),
                                                ':divers'=>array($divers,PDO::PARAM_STR),
                                                ':avatar'=>array($avatar,PDO::PARAM_STR),
                                                ':idNiveau'=>array($idNiveau,PDO::PARAM_STR),
                                                ':idAdresse'=>array($idAdresse,PDO::PARAM_INT)
                                                ));
    }

    public static function supprimerUtilisateur($email){        
        $querry = 'DELETE FROM utilisateur WHERE email=:email';
        Connexion::executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR)));
        return true;
    }

    public static function afficherToutUtilisateur(){        
        $querry = 'SELECT * FROM utilisateur';
        Connexion::executeQuerry($querry, array());
        $result = Connexion::getResults();
        if ($result == false){
            return false;
        }
        return $result;
    }

    public static function modifierUtilisateur($id_utilisateur, $email, $nom,$prenom,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idFamille,$idAdresse){
            
        $querry = 'UPDATE utilisateur   SET     email = :email, 
                                                nom = :nom,
                                                prenom=:prenom,
                                                dateDeNaissance=:dateDeNaissance,
                                                profession=:profession,
                                                divers=:divers,
                                                avatar=:avatar,
                                                idNiveau=:idNiveau,
                                                idAdresse=:idAdresse
                                        WHERE   idUtilisateur=:idUtilisateur';
            
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($id_utilisateur,PDO::PARAM_STR),
                                                ':email'=>array($email,PDO::PARAM_STR),
                                                ':nom'=>array($nom,PDO::PARAM_STR),
                                                ':prenom'=>array($prenom,PDO::PARAM_STR),
                                                ':dateDeNaissance'=>array($dateDeNaissance,PDO::PARAM_STR),
                                                ':profession'=>array($profession,PDO::PARAM_STR),
                                                ':divers'=>array($divers,PDO::PARAM_STR),
                                                ':avatar'=>array($avatar,PDO::PARAM_STR),
                                                ':idNiveau'=>array($idNiveau,PDO::PARAM_STR),
                                                ':idAdresse'=>array($idAdresse,PDO::PARAM_STR)
                                                ));
    }

    public static function modifierMotDePasse($idUser, $newMDP){
        $querry = 'UPDATE utilisateur SET motDePasse=:mot_de_passe WHERE idUtilisateur=:id_utilisateur';
        Connexion::executeQuerry($querry, array(':mot_de_passe'=>array($newMDP,PDO::PARAM_STR),
                                                ':id_utilisateur'=>array($idUser,PDO::PARAM_STR)));
    }

    public static function modifierNiveau($user, $newNiveau){
        $querry = 'UPDATE utilisateur SET idNiveau=:id_niveau_utilisateur WHERE idUtilisateur=:id_utilisateur';
        Connexion::executeQuerry($querry, array(':id_niveau_utilisateur'=>array($newNiveau,PDO::PARAM_INT),
                                                ':id_utilisateur'=>array($user->userId,PDO::PARAM_STR)));
        $user->idNiveau= $newNiveau;
        return $user;
    }
}