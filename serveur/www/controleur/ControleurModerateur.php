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
		try {
			ModelGestionHopital::ajouterHopital();
		} catch(PDOException $ex){;
                $vueErreur[] = $ex->getMessage;
        } catch(Exception $e){
            $vueErreur[]=$e->getMessage();
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
                ModelGestionHopital::ModifierHopital($hopital,$hopital->idAdresse);
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
}