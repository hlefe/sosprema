<?php

/**
 * 
 */
class ControleurBenevol {

    public static function accueil(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/accueil.php');
    }

    public static function vueConnexion(){
        require_once('vue/login.php');
    }
    
    //permet à l'utilisateur de modifier son mot de passe.
    public static function userPassword(){
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas accès à cette partie du site";
            require_once('vue/login.php');
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
        require_once('vue/userPassword.php');
    }
    
    
    
    
    //permet de valider le formulaire de connexion et de créer la session de l'utilisateur.
    public static function connexion() {

        try{
            $utilisateurConnecter = ModelSession::creationUtilisateurConnecter();
            if ($utilisateurConnecter != FALSE) 
                header('Location: index.php?action=accueil');  
        }
        catch(Exception $ex){
            $vueErreur[]=$ex->getMessage();
            require_once('vue/login.php');
        }
    }

    // permet à l'utilisateur de modifier ses données perso.
    public static function profil() {
        $utilisateur = $_SESSION['utilisateurConnecter'];
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['edit'])){
            try{
                $_SESSION['utilisateurConnecter'] = ModelGestionUtilisateur::modifierUtilisateur($utilisateur);
                $utilisateur = $_SESSION['utilisateurConnecter'];
                $vueConfirmation[] = "L'utilisateur à bien été modifié.";
                require_once('vue/profil.php');
            } catch(PDOException $ex){;
                $vueErreur[] = $ex->getMessage();
                require_once('vue/profil.php');
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
                require_once('vue/profil.php');
            }
        }
        else{
            require_once('vue/profil.php');
        }
    }

    //permet de détruire la session d'un utilisateur lorsqu'il se déconnecte.
    public static function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        require_once ('vue/login.php');
    }

}
