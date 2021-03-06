<?php
/**
* Classe FrontControleur
*
* Controleur général, permet de renvoyer vers le bon controleur
* @package controlleur
*/
class FrontControleur {
    
    public static function init() {
        require_once 'metier/Utilisateur.php';
        require_once 'metier/Adresse.php';
        require_once 'metier/ContactHopital.php';
        require_once 'metier/ContactLocal.php';
        require_once 'metier/Telephone.php'; 
        require_once 'metier/Hopital.php';
        require_once 'metier/Niveau.php';
        require_once 'metier/Page.php';
        require_once 'metier/Telephone.php';
        
        
        session_start();

        if(!isset($_REQUEST['action'])){
        	require_once('vue/pages/login.php');
        	return;
        }
        elseif((!isset($_SESSION['utilisateurConnecter'])&& $_REQUEST['action']!= 'connexion')){
        	require_once('vue/pages/login.php');
        	return;
        }

        $listeActionAdmin =  get_class_methods('ControleurAdmin');
        $listeActionBenevol =  get_class_methods('ControleurBenevol');
        $listeActionModerateur =  get_class_methods('ControleurModerateur');
         
        $action = $_REQUEST['action']; 
        if(in_array($action, $listeActionAdmin)){
        	if(ControleurAdmin::verifierDroit()){
        		ControleurAdmin::$action();
        	}
        	else{
        		$vueErreur[] = "vous ne possédez pas les droits appopriés.";
                require_once ("vue/includes/erreur.php");
                return;
            }
        }elseif(in_array($action, $listeActionModerateur)){
        	if(ControleurModerateur::verifierDroit()){
        		ControleurModerateur::$action();
        	}
        	else{
        		$vueErreur[] = "vous ne possédez pas les droits appopriés.";
                require_once ("vue/includes/erreur.php");
                return;
            }
        }elseif(in_array($action, $listeActionBenevol)){
        	ControleurBenevol::$action();
        }else{
        	$vueErreur[]="l'action demander n'est pas définie";
        	require_once('vue/includes/vueErreur.php');
        }
    }
}