<?php

/**
* Classe ControleurBenevol
*
* Controleur benevole, permet de gérer les actions relatives au benevole
*/
class ControleurBenevol {
    /**
    * Fonction accueil
    *
    * permet l'accès à l'accueil
    */
    public static function accueil(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/pages/accueil.php');
    }

    /**
    * Fonction vueConnexion
    *
    * permet l'accès à la vue connexion
    */
    public static function vueConnexion(){
        require_once('vue/pages/login.php');
    }
    
    /**
    * Fonction userPassword
    *
    * permet à l'utilisateur de modifier son mot de passe.
    */
    public static function userPassword(){
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas accès à cette partie du site";
            require_once('vue/pages/login.php');
            return;
        }
        if(isset($_REQUEST['edit'])){
            try{
                $_SESSION['utilisateurConnecter'] = ModelGestionUtilisateur::modifierMotDePasse($_SESSION['utilisateurConnecter']);
                $vueConfirmation[]="Votre mot de passe à bien été modifié";
            }catch(Exception $e){
                $vueErreur[] = $e->getMessage();
            }catch(PDOException $e){
                $vueErreur[] = $e->getMessage();
            }
        }
        require_once('vue/pages/userPassword.php');
    }    
    
    /**
    * Fonction connexion
    *
    * permet de valider le formulaire de connexion et de créer la session de l'utilisateur.
    */
    public static function connexion() {

        try{
            $utilisateurConnecter = ModelSession::creationUtilisateurConnecter();
            if ($utilisateurConnecter != FALSE) 
                header('Location: index.php?action=accueil');  
        }
        catch(Exception $ex){
            $vueErreur[]=$ex->getMessage();
            require_once('vue/pages/login.php');
        }
    }

    /**
    * Fonction profil
    *
    * permet à l'utilisateur de modifier ses données perso.
    */
    public static function profil() {
        $utilisateur = $_SESSION['utilisateurConnecter'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                $modifProfil = true;
                $_SESSION['utilisateurConnecter'] = ModelGestionUtilisateur::modifierUtilisateur($utilisateur);
                $utilisateur = $_SESSION['utilisateurConnecter'];
                $vueConfirmation[] = "L'utilisateur à bien été modifié.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/profil.php');
    }
   
    /**
    * Fonction deconnexion
    *
    * permet de détruire la session d'un utilisateur lorsqu'il se déconnecte.
    */
    public static function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        require_once ('vue/pages/login.php');
    }
    
    /**
    * Fonction afficherHopitaux
    *
    * permet d'afficher la liste des hôpitaux
    */
    public static function afficherHopitaux(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $hopitaux=ModelGestionHopital::afficherToutHopital();
        require_once ('vue/pages/hopitaux.php');
    }
    
    /**
    * Fonction afficherHopital
    *
    * permet d'afficher un Hopital
    */
    public static function afficherHopital(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        //Recherche hopital
        $hopital = ModelGestionHopital::rechercherHopital($_GET['id']);
        require_once ('vue/pages/hopital.php');
    }

    /**
    * Fonction ajouterTelephone
    *
    * permet à d'ajouter un telephone à son profil
    */
    public static function ajouterTelephone(){
        $utilisateur = $_SESSION['utilisateurConnecter'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                $_SESSION['utilisateurConnecter'] = ModelTelephone::ajouterTelephone($utilisateur);
                $utilisateur = $_SESSION['utilisateurConnecter'];
                $vueConfirmation[] = "Le numéro de téléphone à bien été ajouté.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/profil.php');
    }

    /**
    * Fonction modifierTelephone
    *
    * permet de modifier un telephone 
    */
    public static function modifierTelephone(){
        $utilisateur = $_SESSION['utilisateurConnecter'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                ModelTelephone::modifierTelephone($_REQUEST['idTelephone']);
                $_SESSION['utilisateurConnecter'] = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
                $utilisateur = $_SESSION['utilisateurConnecter'];
                $vueConfirmation[] = "Le numéro de téléphone à bien été ajouter.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/profil.php');
    }

    /**
    * Fonction supprimerTelephone
    *
    * permet de supprimer un telephone
    */
    public static function supprimerTelephone(){
        $utilisateur = $_SESSION['utilisateurConnecter'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                ModelTelephone::supprimerTelephone($_REQUEST['idTelephone']);
                $_SESSION['utilisateurConnecter'] = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
                $utilisateur = $_SESSION['utilisateurConnecter'];
                $vueConfirmation[] = "Le numéro de téléphone à bien été supprimer.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/profil.php');
    }

}
