<?php

/**
 * 
 */
class ControleurModerateur {
    
    //fonction permettant de vérifier si un utilisateur est moderateur ou non.
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

	public static function modifierHopital(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        if(isset($_GET['id'])){
            $hopital = ModelGestionHopital::rechercherHopital($_GET['id']);
            $_SESSION['hopitalModifie'] = $hopital;
        }else{
            $hopital = $_SESSION['hopitalModifie'];
            try {
                $hopital = ModelGestionHopital::ModifierHopital($hopital->idHopital);
                $_SESSION['hopitalModifie']=$hopital;
            } catch(PDOException $ex){
                    $vueErreur[] = $ex->getMessage();
            } catch(Exception $e){
                $vueErreur[]=$e->getMessage();
            }
        }
        require_once('vue/pages/moderateur/modificationHopital.php');
    }

	public static function supprimerHopital(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
	}

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

    public static function supprimerContactHopital(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try {
            ModelContactHopital::supprimerContactHopital($_REQUEST['idContactHopital']);
            $hopital = ModelGestionHopital::rechercherHopital($_REQUEST['idHopital']);
            $_SESSION['hopitalModifie']=$hopital;
        } catch(PDOException $ex){
            $vueErreur[] = $ex->getMessage();
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
        }
        require_once('vue/pages/moderateur/modificationHopital.php');
    }
    
    public static function afficherTousLesContactsLocaux(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
         $contacts = ModelContactLocal::afficherToutContact();
         $idHopital =  $_GET['idHopital'];
        require_once('vue/includes/hopital/contacts/ajoutL.php');
	}
    public static function afficherTousLesContactsHopitaux(){
		$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        require_once('vue/includes/hopital/contacts/ajoutH.php');
	}
}