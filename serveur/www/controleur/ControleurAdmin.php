<?php

/**
 * 
 */
class ControleurAdmin {

    // permet à l'administrateur d'ajouter un utilisateur.
    public static function vueAjoutUtilisateur() {
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $niveaux = ModelNiveau::getAll();
        if(isset($_REQUEST['add'])){
            try{
                ModelGestionUtilisateur::creerUtilisateur();
                $vueConfirmation[] = "L'utilisateur à bien été ajouté.";
                require_once('vue/ajoutUtilisateur.php');
            } catch(PDOException $ex){
                $vueErreur[] = $ex->getMessage();
                require_once('vue/ajoutUtilisateur.php');
            } catch(Exception $e){
                $vueErreur[] = $e->getMessage();
                require_once('vue/ajoutUtilisateur.php');
            }
        }
        else{
            $allNiveau=ModelNiveau::getAll();
            require_once('vue/ajoutUtilisateur.php');
        }

    }

    //permet la supression d'un utilisateur grace à son adresse email.
    public static function supprimerUtilisateur(){
         $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        if(!isset($_GET['mail'])){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/vueErreur.php');
            return;
        }
        $email = Nettoyage::nettoyerChaine($_GET['mail']);

        
        try{

            ModelGestionUtilisateur::supprimerUtilisateur($email);
            $vueConfirmation[] = "L'utilisateur à bien été suprimé.";
            $listeUsers = ModelGestionUtilisateur::afficherToutUtilisateur();
            require_once('vue/listeUtilisateurs.php');
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            $listeUsers = ModelGestionUtilisateur::afficherToutUtilisateur();
            require_once('vue/listeUtilisateurs.php');
        }
    }

    //fonction permettant l'apelle à la vue pour modifier un utilisateur.
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
                $_SESSION['utilisateurModifie'] = ModelGestionUtilisateur::modifierUtilisateur($utilisateur);
                $utilisateur = $_SESSION['utilisateurModifie'];
                $vueConfirmation[] = "L'utilisateur à bien été modifié.";
            } catch(PDOException $ex){;
                $vueErreur[] = $ex->getMessage();
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/userEdit.php');
    }

    //fonction permettant à un aministrateur de modifier un utilisateur.
    public static function adminModifierUtilisateur(){
        $utilisateur=$_SESSION['utilisateurModifie'];

        
    }

    //fonction permettant la récupération de tout les utilisateurs dans la base.
    public static function afficherToutUtilisateur(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $listeUsers = ModelGestionUtilisateur::afficherToutUtilisateur();
        require_once('vue/listeUtilisateurs.php');
    }

    //fonction permettant de vérifier si un utilisateur est admin ou non.
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
            require_once('vue/vueErreur.php');
        }
    }

    public static function gestion(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/gestion.php');
    }

    public static function listeUtilisateurs(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $listeUsers = self::afficherToutUtilisateur();
        require_once('vue/listeUtilisateurs.php');
    }
    
    //Modifier les informations de sécurité/droit d'un utilisateur ( Mot de passe & niveau)
     public static function safeUserInfo(){
        $niveaux = ModelNiveau::getAll();
        $utilisateurModifie = $_SESSION['utilisateurModifie'];
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas accès à cette partie du site";
            require_once('vue/login.php');
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
        require_once('vue/safeUserInfo.php');
    }
}