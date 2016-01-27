<?php

/**
 * 
 */
class ControleurBenevol {

    public static function accueil(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/accueil.php');
    }

    public static function profil(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/profil.php');
    }

    public static function vueConnexion(){
        require_once('vue/login.php');
    }

    public static function vueModifierMotDePasse(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/modifierMDP.php');
    }

    //permet de valider le formulaire de connexion et de créer la session de l'utilisateur.
    public static function connexion() {

        try{
            $utilisateurConnecter = ModelSession::creationUtilisateurConnecter();
        }catch(Exception $ex){
            $vueErreur[]=$ex->getMessage();
            require_once('vue/login.php');
        }
        if ($utilisateurConnecter != FALSE) {
            require_once('vue/accueil.php');   
        }
    }

    // permet à l'utilisateur de modifier ses données perso.
    public static function modifierUtilisateur() {
        
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        try{
            $_SESSION['utilisateurConnecter'] = ModelGestionUtilisateur::modifierUtilisateur($utilisateurConnecter);
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
            $vueConfirmation[] = "L'utilisateur à bien été modifié.";
            require_once('vue/profil.php');
        } catch(PDOException $ex){;
            $vueErreur[] = $ex->getMessage();
            require_once('vue/profil.php');
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
            require_once('vue/profil.php');
            return;
        }
    }

    //permet à l'utilisateur de modifier son mot de passe.
    public static function modifierMotDePasse(){
        
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas à avoir accés à cette partie du site";
            require_once('vue/login.php');
            return;
        }

        try{
            $_SESSION['utilisateurConnecter'] = ModelGestionUtilisateur::modifierMotDePasse($_SESSION['utilisateurConnecter']);
        }catch(Exception $e){
            $vueErreur[] = $e->getMessage();
            require_once('vue/modifierMDP.php');
            return;
        }catch(PDOException $e){
            $vueErreur[] = $e->getMessage();
            require_once('vue/modifierMDP.php');
            return;
        }
        $vueConfirmation[]="Votre mot de passe à bien été modifié";
        require_once('vue/modifierMDP.php');
    }

    //permet de détruire la session d'un utilisateur lorsqu'il se déconnecte.
    public static function detruireSession(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        require_once ('vue/login.php');
    }

}
