<?php

/**
* Classe ControleurAdmin
*
* Controleur administrateur, permet de gérer les actions relatives à l'administrateur
* @package controlleur
*/
class ControleurAdmin {
    /**
    * Fonction ajoutUtilisateur
    *
    * permet à l'administrateur d'ajouter un utilisateur.
    */
    public static function ajoutUtilisateur() {
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $niveaux = ModelNiveau::getAll();
        if(isset($_REQUEST['add'])){
            try{
                ModelGestionUtilisateur::creerUtilisateur();
                $vueConfirmation[] = "L'utilisateur à bien été ajouté.";               
            } catch(PDOException $ex){
                $vueErreur[] = $ex->getMessage();
            } catch(Exception $e){
                $vueErreur[] = $e->getMessage();
            }
        }
        else{
            $allNiveau=ModelNiveau::getAll();
        }
        require_once('vue/pages/admin/ajoutUtilisateur.php');

    }
    
    /**
    * Fonction userEdit
    *
    * fonction permettant l'apelle à la vue pour modifier un utilisateur.
    */
    public static function userEdit(){
        //Définition utilisateur connecté
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        
        // Si une adresse mail est définie dans l'url, changement d'utilisateur à modifier
        // et donc on saute l'étape de prise en compte des modifications, 
        // car on vient forcément d'une page différente.
        if(isset($_GET['mail'])){
            //Recherche utilisateur
            $utilisateur = ModelGestionUtilisateur::rechercheUtilisateur($_GET['mail']);
            $_SESSION['utilisateurModifie'] = $utilisateur;
        }else{
            //Récupération de l'utilisateur à modifier
            $utilisateur=$_SESSION['utilisateurModifie'];
            try{
                //modification de cet utilisateur
                if(isset($_GET['mailC'])){
                    ModelContactLocal::ajouterContactLocal($utilisateur->userId);
                    $utilisateur = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
                    $_SESSION['utilisateurModifie'] = $utilisateur;
                }
                elseif(isset($_GET['mailCdelete'])){
                    ModelContactLocal::supprimerContact($utilisateur->contactLocal->idContact);
                    $utilisateur = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
                    $_SESSION['utilisateurModifie'] = $utilisateur;
                }
                else{
                    $modifProfil = false;
                    $_SESSION['utilisateurModifie'] = ModelGestionUtilisateur::modifierUtilisateur($utilisateur);
                }
                $utilisateur = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
                $vueConfirmation[] = "L'utilisateur à bien été modifié.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex->getMessage();
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/admin/userEdit.php');
    }
    
    /**
    * Fonction adminModifierUtilisateur
    *
    * fonction permettant à un aministrateur de modifier un utilisateur.
    */
    public static function adminModifierUtilisateur(){
        $utilisateur=$_SESSION['utilisateurModifie'];

        
    }
 
    /**
    * Fonction verifierDroit
    *
    * fonction permettant de vérifier si un utilisateur est admin ou non.
    */
     public static function verifierDroit(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try{
            if(isset($_SESSION['utilisateurConnecter']->idNiveau)) echo "string";
            $libelle = ModelNiveau::rechercherNom($_SESSION['utilisateurConnecter']->idNiveau);
            if( $libelle == 'administrateur'){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $ex){
            $vueErreur[]=$ex->getMessage();
            require_once('vue/includes/vueErreur.php');
        }
    }
    
    /**
    * Fonction gestion
    *
    * permet d'accéder à la page gestion
    */
    public static function gestion(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/gestion.php');
    }
    
    /**
    * Fonction listeUtilisateurs
    *
    * permet d'accéder à la liste des utilisateurs
    */
    public static function listeUtilisateurs(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_GET['mail'])){
            $email = Nettoyage::nettoyerChaine($_GET['mail']);
            try{
                ModelGestionUtilisateur::supprimerUtilisateur($email);
                $vueConfirmation[] = "L'utilisateur a bien été suppprimé.";
            } catch(PDOException $ex){
                $vueErreur[] = "Erreur base de donnée, PDOException";
            }
        }
        $contactsLocaux = ModelContactLocal::afficherToutContact();
        $listeUsers = ModelGestionUtilisateur::afficherToutUtilisateur();
        require_once('vue/pages/admin/listeUtilisateurs.php');
    }

    /**
    * Fonction safeUserInfo
    *
    * Modifier les informations de sécurité/droit d'un utilisateur ( Mot de passe & niveau)
    */
     public static function safeUserInfo(){
        $niveaux = ModelNiveau::getAll();
        $utilisateurModifie = $_SESSION['utilisateurModifie'];
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas accès à cette partie du site";
            require_once('vue/pages/login.php');
            return;
        }
        if(isset($_REQUEST['edit'])){
            try{
                $_SESSION['utilisateurModifie'] = ModelGestionUtilisateur::modifierSafeUserInfo($utilisateurModifie);
                $vueConfirmation[]="Informations de sécurité mises à jour";
            }catch(Exception $e){
                $vueErreur[] = $e->getMessage();
            }catch(PDOException $e){
                $vueErreur[] = $e->getMessage();
            }
        }
        require_once('vue/pages/admin/securityUserInfo.php');
    }

    /**
    * Fonction ajouterUtilisateurCommeContact
    *
    * Permet de transformer un utilisateur en contact local
    */
    public static function ajouterUtilisateurCommeContact(){
        if(isset($_GET['mailC'])){
            $utilisateurModifie = ModelGestionUtilisateur::rechercheUtilisateur($_GET['mailC']);
        } else {
            $utilisateurModifie = $_SESSION['utilisateurModifie'];
        }
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas accès à cette partie du site";
            require_once('vue/pages/login.php');
            return;
        }
        if(isset($_REQUEST['edit'])){
            try{
                $_SESSION['utilisateurModifie'] = ModelContactLocal::ajouterContactLocal($utilisateurModifie->userId);
                $vueConfirmation[]="L'utilisateur est un contact local.";
            }catch(Exception $e){
                $vueErreur[] = $e->getMessage();
            }catch(PDOException $e){
                $vueErreur[] = $e->getMessage();
            }
        }
        require_once('vue/includes/userEdit/contactLocal/contactLocal.php');
    }

    /**
    * Fonction modifierContactLocal
    *
    * permet à l'administrateur de modifier un contact local
    */
    public static function modifierContactLocal(){
        $utilisateurModifie = $_SESSION['utilisateurModifie'];
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas accès à cette partie du site";
            require_once('vue/pages/login.php');
            return;
        }
        if(isset($_REQUEST['edit'])){
            try{
                $_SESSION['utilisateurModifie'] = ModelContactLocal::modifierContactLocal($utilisateurModifie->contactLocal->idContact);
                $vueConfirmation[]="L'utilisateur est un contact local.";
            }catch(Exception $e){
                $vueErreur[] = $e->getMessage();
            }catch(PDOException $e){
                $vueErreur[] = $e->getMessage();
            }
        }
        require_once('vue/pages/admin/ajoutContactLocal.php');
    }

    /**
    * Fonction ajouterTelephoneUtilisteur
    *
    * permet à l'administrateur d'ajouter un numéro de télephone à un utilisateur
    */
    public static function ajouterTelephoneUtilisteur(){
        $utilisateur = $_SESSION['utilisateurModifie'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                $_SESSION['utilisateurModifie'] = ModelTelephone::ajouterTelephone($utilisateur);
                $utilisateur = $_SESSION['utilisateurModifie'];
                $vueConfirmation[] = "Le numéro de téléphone à bien été ajouter.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/ajoutModifTelephone.php');
    }

    /**
    * Fonction modifierTelephoneUtilisateur
    *
    * permet à l'administrateur de modifier le no de telephone d'un user
    */
    public static function modifierTelephoneUtilisateur(){
        $utilisateur = $_SESSION['utilisateurModifie'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                ModelTelephone::modifierTelephone($_REQUEST['idTelephone']);
                $_SESSION['utilisateurModifie'] = ModelGestionUtilisateur::rechercherUtilisateur($utilisateur->email);
                $utilisateur = $_SESSION['utilisateurModifie'];
                $vueConfirmation[] = "Le numéro de téléphone à bien été ajouter.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/ajoutModifTelephone.php');
    }
    
    /**
    * Fonction supprimerTelephoneUser
    *
    * permet à l'administrateur de supprimer un numero de telephone utilisateur
    */
    public static function supprimerTelephoneUser(){
        $utilisateur = $_SESSION['utilisateurModifie'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                ModelTelephone::supprimerTelephone($_REQUEST['idTelephone']);
                $_SESSION['utilisateurModifie'] = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
                $utilisateur = $_SESSION['utilisateurModifie'];
                $vueConfirmation[] = "Le numéro de téléphone à bien été supprimer.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/admin/userEdit.php');
    }
}