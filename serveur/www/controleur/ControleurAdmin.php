<?php

/**
 * 
 */
class ControleurAdmin {

    // permet à l'administrateur d'ajouter un utilisateur.
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

    //fonction permettant à un aministrateur de modifier un utilisateur.
    public static function adminModifierUtilisateur(){
        $utilisateur=$_SESSION['utilisateurModifie'];

        
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
            require_once('vue/includes/vueErreur.php');
        }
    }

    public static function gestion(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/gestion.php');
    }
    
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

    
    //Modifier les informations de sécurité/droit d'un utilisateur ( Mot de passe & niveau)
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