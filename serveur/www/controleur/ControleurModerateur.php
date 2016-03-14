<?php

/**
* Classe ControleurModerateur
*
* Controleur moderateur, permet de gérer les actions relatives au moderateur
* @package controlleur
*/
class ControleurModerateur {
    
    /**
    * Fonction verifierDroit
    *
    * fonction permettant de vérifier les droits de l'utilisateur
    */
     public static function verifierDroit(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try{
            if(isset($_SESSION['utilisateurConnecter']->idNiveau)) echo "string";
            if( $_SESSION['utilisateurConnecter']->idNiveau >=2){
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
    * Fonction ajouterHopital
    *
    * permet d'ajouter un hopital
    */
	public static function ajouterHopital(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_REQUEST['add'])){
    		try {
    			ModelGestionHopital::ajouterHopital();
                $vueConfirmation[] = "L'hopital à bien été ajouté.";
    		} catch(PDOException $ex){;
                    $vueErreur[] = $ex->getMessage;
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/moderateur/ajouterHopital.php');
	}
    
    /**
    * Fonction modifierHopital
    *
    * permet de modifier un hopital
    */
	public static function modifierHopital(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_GET['id'])){
            $hopital = ModelGestionHopital::rechercherHopital($_GET['id']);
            $_SESSION['hopitalModifie'] = $hopital;
        }else{
            $hopital = $_SESSION['hopitalModifie'];
            try {
                if(isset($_GET['idContactHopital'])){
                    ModelContactHopital::supprimerContactHopital($_GET['idContactHopital']);
                }
                elseif(isset($_GET['idContactLocal'])){
                    ModelRelation::supprimerRelation($hopital->idHopital,$_GET['idContactLocal']);
                }
                else{
                    $hopital = ModelGestionHopital::ModifierHopital($hopital->idHopital);
                }
                $hopital = ModelGestionHopital::rechercherHopital($hopital->idHopital);
                $_SESSION['hopitalModifie']=$hopital;
            } catch(PDOException $ex){
                    $vueErreur[] = $ex->getMessage();
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/moderateur/modificationHopital.php');
    }

    /**
    * Fonction supprimerHopital
    *
    * permet de supprimer un hopital
    */
	public static function supprimerHopital(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try {
            ModelGestionHopital::supprimerHopital($_REQUEST['id']);
            $hopitaux=ModelGestionHopital::afficherToutHopital();
        } catch(PDOException $ex){
            $vueErreur[] = $ex->getMessage();
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
        }
        require_once('vue/pages/hopitaux.php');
	}

    /**
    * Fonction ajouterRelation
    *
    * permet d'ajouter une relation
    */
    public static function ajouterRelation(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try {
            ModelRelation::ajouterRelation($_REQUEST['idHopital'], $_REQUEST['idContact']);
            $hopital = ModelGestionHopital::rechercherHopital($_REQUEST['idHopital']);
            $_SESSION['hopitalModifie']=$hopital;
        } catch(PDOException $ex){
            $vueErreur[] = $ex->getMessage();
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
        }
        require_once('vue/pages/moderateur/modificationHopital.php');
    }

    /**
    * Fonction supprimerRelation
    *
    * permet de supprimer une relation
    */
    public static function supprimerRelation(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try {
            ModelRelation::supprimerRelation($_REQUEST['idHopital'], $_REQUEST['idContact']);
            $hopital = ModelGestionHopital::rechercherHopital($_REQUEST['idHopital']);
            $_SESSION['hopitalModifie']=$hopital;
        } catch(PDOException $ex){
            $vueErreur[] = $ex->getMessage();
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
        }
        require_once('vue/pages/moderateur/modificationHopital.php');
    }

    /**
    * Fonction ajouterContactHopital
    *
    * permet d'ajouter un contact hopital
    */
    public static function ajouterContactHopital(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try {
            ModelContactHopital::ajouterContactHopital();
            $hopital = ModelGestionHopital::rechercherHopital($_REQUEST['idHopital']);
            $_SESSION['hopitalModifie']=$hopital;
        } catch(PDOException $ex){
            $vueErreur[] = $ex->getMessage();
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
        }
        require_once('vue/pages/moderateur/modificationHopital.php');
    }

    /**
    * Fonction supprimerContactHopital
    *
    * permet de supprimer un contact hopital
    */
    public static function supprimerContactHopital(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try {
            ModelContactHopital::supprimerContactHopital($_GET['idContactHopital']);
            $hopital = ModelGestionHopital::rechercherHopital(($_GET['idHopital']));
            $_SESSION['hopitalModifie']=$hopital;
        } catch(PDOException $ex){
            $vueErreur[] = $ex->getMessage();
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
        }
        require_once('vue/pages/moderateur/modificationHopital.php');
    }
    
    /**
    * Fonction afficherTousLesContactsLocaux
    *
    * permet d'afficher tous les contacts locaux
    */
    public static function afficherTousLesContactsLocaux(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $contacts = ModelContactLocal::afficherToutContact();
        $idHopital =  $_GET['idHopital'];
         
        require_once('vue/includes/hopital/contacts/ajoutL.php');
	}
    
    /**
    * Fonction afficherTousLesContactsHopitaux
    *
    * permet àd'afficher tous les contacts hopitaux
    */
    public static function afficherTousLesContactsHopitaux(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/includes/hopital/contacts/ajoutH.php');
	}
}