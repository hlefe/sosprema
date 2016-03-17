<?php
/**
* Classe UtilisateurGateway
*
* Gateway de Utilisateur (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class UtilisateurGateway {

    /**
    * Fonction de recherche de l'utilisateur qui tente de se connecter. 
    * 
    * Permet de rechercher l'utilisateur qui tente de se connecter.
    * @param email de l'utilisateur.
    * @param password mot de passe de l'utilisateur.
    * @return utilisateur retourne l'utilisateur qui s'est connecter ou faux sinon.
    */
    public static function rechercheUtilisateurConnexion($email, $password)
    {   
        $password = md5($password);
        $querry = 'SELECT * FROM utilisateur WHERE email=:email AND motDePasse=:password';
        Connexion::executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR),
                                                ':password'=>array($password,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $utilisateur = new Utilisateur($result);
        if($utilisateur->idAdresse!=NULL){
            $adresse = AdresseGateway::rechercherAdresseById($utilisateur->idAdresse);
            $ville = VilleGateway::rechercherVilleById($adresse['idVille']);
            $departement = DepartementGateway::rechercherDepartementById($ville['idDepartement']);
            $region = RegionGateway::rechercherRegionById($departement['idRegion']);
            $userAdresse = array('numRue' => $adresse['numRue'], 
                                  'nomRue' => $adresse['nomRue'],
                                  'codePostal' => $ville['codePostal'],
                                  'nomVille' => $ville['nomVille'],
                                  'nomDepartement' => $departement['nomDepartement'],
                                  'nomRegion' => $region['nomRegion']);
            $utilisateur->adresse = new Adresse($userAdresse);
        }
        $listeTel = TelephoneGateway::rechercheTelephoneUtilisateur($utilisateur->userId);
        if($listeTel != null){
            $utilisateur->telephones = $listeTel;
        }
        $contactLocal = ContactLocalGateway::rechercherContactLocalByIdUser($utilisateur->userId);
        if($contactLocal != false){
            $utilisateur->contactLocal = $contactLocal;
        }
        return $utilisateur;
    }

    /**
    * Fonction de recherche d'un utilisateur qui tente de se connecter. 
    * 
    * Permet de rechercher un  utilisateur qui tente de se connecter.
    * @param email de l'utilisateur à rechercher.
    * @return utilisateur retourne l'utilisateur recherché.
    */
    public static function rechercheUtilisateurEmail($email){   
        $querry = 'SELECT * FROM utilisateur WHERE email=:email';
        Connexion::executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $utilisateur = new Utilisateur($result);
        if($utilisateur->idAdresse!=NULL){
            $adresse = AdresseGateway::rechercherAdresseById($utilisateur->idAdresse);
            $ville = VilleGateway::rechercherVilleById($adresse['idVille']);
            $departement = DepartementGateway::rechercherDepartementById($ville['idDepartement']);
            $region = RegionGateway::rechercherRegionById($departement['idRegion']);
            $userAdresse = array('numRue' => $adresse['numRue'], 
                                  'nomRue' => $adresse['nomRue'],
                                  'codePostal' => $ville['codePostal'],
                                  'nomVille' => $ville['nomVille'],
                                  'nomDepartement' => $departement['nomDepartement'],
                                  'nomRegion' => $region['nomRegion']);
            $utilisateur->adresse = new Adresse($userAdresse);
        }
        $listeTel = TelephoneGateway::rechercheTelephoneUtilisateur($utilisateur->userId);
        if($listeTel != null){
            $utilisateur->telephones = $listeTel;
        }
        $contactLocal = ContactLocalGateway::rechercherContactLocalByIdUser($utilisateur->userId);
        if($contactLocal != false){
            $utilisateur->contactLocal = $contactLocal;
        }
            return $utilisateur;  
    }

    /**
    * Fonction de recherche d'utilisateur par le nom. 
    * 
    * Permet de rechercher l'utilisateur par son nom.
    * @param nom de l'utilisateur recherché.
    * @return utilisateur retourne l'utilisateur recherché.
    */
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

    /**
    * Fonction de recherche de l'utilisateur. 
    * 
    * Permet de rechercher l'utilisateur par son id.
    * @param id_utilisateur correspond à l'id d'utilisateur.
    * @return utilisateur retourne l'utilisateur recherché.
    */
    public static function rechercheUtilisateurId($id_utilisateur)
    {        
        $querry = 'SELECT * FROM utilisateur WHERE idUtilisateur=:idUtilisateur';
        Connexion::executeQuerry($querry, array(':idUtilisateur'=>array($id_utilisateur,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $utilisateur = new Utilisateur($result);
        if($utilisateur->idAdresse!=NULL){
            $adresse = AdresseGateway::rechercherAdresseById($utilisateur->idAdresse);
            $ville = VilleGateway::rechercherVilleById($adresse['idVille']);
            $departement = DepartementGateway::rechercherDepartementById($ville['idDepartement']);
            $region = RegionGateway::rechercherRegionById($departement['idRegion']);
            $userAdresse = array('numRue' => $adresse['numRue'], 
                                  'nomRue' => $adresse['nomRue'],
                                  'codePostal' => $ville['codePostal'],
                                  'nomVille' => $ville['nomVille'],
                                  'nomDepartement' => $departement['nomDepartement'],
                                  'nomRegion' => $region['nomRegion']);
            $utilisateur->adresse = new Adresse($userAdresse);
        }
        $listeTel = TelephoneGateway::rechercheTelephoneUtilisateur($utilisateur->userId);
        if($listeTel != null){
            $utilisateur->telephones = $listeTel;
        }
        $contactLocal = ContactLocalGateway::rechercherContactLocalByIdUser($utilisateur->userId);
        if($contactLocal != false){
            $utilisateur->contactLocal = $contactLocal;
        }
        return $utilisateur;
    }

    /**
    * Fonction d'insertion d'un utilisateur.
    * 
    * Permet d'insérer un utilisateur.
    * @param email correspond à l'email de l'utilisateur.
    * @param nom correspond au nom de l'utilisateur.
    * @param prenom correspond au prenom de l'utilisateur.
    * @param motDePasse correspond au mot de passe de l'utilisateur.
    * @param dateDeNaissance correspond à la date de naissance de l'utilisateur.
    * @param profession correspond à la proffesion de l'utilisateur.
    * @param divers correspond au divers éléments à ajouter pour l'utilisateur.
    * @param avatar correspond àl'avatar de l'utilisateur (ou le badge).
    * @param idNiveau correspond à l'id du niveau de droit de l'utilisateur
    * @param idAdresse correspond à l'id de l'adresse de l'utilisateur.
    */
    public static function insererUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idAdresse){
        $motDePasse = md5($motDePasse);
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
        return self::rechercheUtilisateurEmail($email);
    }

    /**
    * Fonction de supression de l'utilisateur. 
    * 
    * Permet de supprimer l'utilisateur par son email.
    * @param email correspond à l'email de l'utilisateur à supprimer.
    * @return true pour prévenir que la suppression a réussi.
    */
    public static function supprimerUtilisateur($email){    
        $querry = 'DELETE FROM utilisateur WHERE email=:email';
        Connexion::executeQuerry($querry, array(':email'=>array($email,PDO::PARAM_STR)));
        return true;
    }

    /**
    * Fonction de récupération de l'ensemble des utilisateurs. 
    * 
    * Permet de récupérer l'ensemble des utilisateurs.
    * @return result retourne l'ensemble des utilisateurs triés par le nom et le prénom.
    */
    public static function afficherToutUtilisateur(){
        //ancienne version non triè. 
        //$querry = 'SELECT * FROM utilisateur';
        //Version avec le nom et le prénom triè;
        $querry = 'SELECT * FROM utilisateur ORDER BY nom, prenom';
        Connexion::executeQuerry($querry, array());
        $result = Connexion::getResults();
        if ($result == false){
            return false;
        }
        return $result;
    }

    /**
    * Fonction de modification d'un utilisateur.
    * 
    * Permet de modifier un utilisateur.
    * @param id_utilisateur id de l'utilisateur à modifier.
    * @param email correspond à l'email de l'utilisateur.
    * @param nom correspond au nom de l'utilisateur.
    * @param prenom correspond au prenom de l'utilisateur.
    * @param motDePasse correspond au mot de passe de l'utilisateur.
    * @param dateDeNaissance correspond à la date de naissance de l'utilisateur.
    * @param profession correspond à la profession de l'utilisateur.
    * @param divers correspond aux divers éléments à ajouter pour l'utilisateur.
    * @param avatar correspond à l'avatar de l'utilisateur (ou le badge).
    * @param idNiveau correspond à l'id du niveau de droit de l'utilisateur
    * @param idAdresse correspond à l'id de l'adresse de l'utilisateur.
    */
    public static function modifierUtilisateur($id_utilisateur, $email, $nom,$prenom,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idAdresse){
            
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

    /**
    * Fonction de modifier du mot de passe d'un utilisateurs. 
    * 
    * Permet de modifier le mot de passe d'un utilisateurs.
    * @param idUser correspond à l'id de l'utilisateur auquel on veut modifier le mot de passe.
    * @param newMDP correspond au nouveau mot de passe à insérer dans la base de données.
    */
    public static function modifierMotDePasse($idUser, $newMDP){
        $newMDP = md5($newMDP);
        $querry = 'UPDATE utilisateur SET motDePasse=:mot_de_passe WHERE idUtilisateur=:id_utilisateur';
        Connexion::executeQuerry($querry, array(':mot_de_passe'=>array($newMDP,PDO::PARAM_STR),
                                                ':id_utilisateur'=>array($idUser,PDO::PARAM_STR)));
    }

    /**
    * Fonction de modification du niveau de droit d'un utilisateurs. 
    * 
    * Permet de modifier le niveau de droit d'un utilisateur.
    * @param user correspond à l'utilisateur auquel on veut modifier le niveau.
    * @param newNiveau correspond au nouveau niveau à insérer dans la base de données.
    * @return result retourne l'utilisateur avec son niveau modifié.
    */
    public static function modifierNiveau($user, $newNiveau){
        $querry = 'UPDATE utilisateur SET idNiveau=:id_niveau_utilisateur WHERE idUtilisateur=:id_utilisateur';
        Connexion::executeQuerry($querry, array(':id_niveau_utilisateur'=>array($newNiveau,PDO::PARAM_INT),
                                                ':id_utilisateur'=>array($user->userId,PDO::PARAM_STR)));
        $user->idNiveau= $newNiveau;
        return $user;
    }
}