<?php

class FrontControleur {
    
    function init() {

        session_start();

        if(!isset($_REQUEST['action'])){
        	require_once('vue/login.php');
        	return;
        }elseif((!isset($_SESSION['utilisateurConnecter'])&& $_REQUEST['action']!= 'connexion')){
        	require_once('vue/login.php');
        	return;
        }

        $listeActionAdmin =  get_class_methods('ControleurAdmin');
        $listeActionBenevol =  get_class_methods('ControleurBenevol');

        $action = $_REQUEST['action'];

        if(in_array($action, $listeActionAdmin)){
        	if(ControleurAdmin::verifierDroit()){
        		ControleurAdmin::$action();
        	}
        	else{
        		$vueErreur[] = "vous ne possédez pas les droits appopriées.";
                require_once ("/vue/erreur.php");
                return;
            }
        }elseif(in_array($action, $listeActionBenevol)){
        	ControleurBenevol::$action();
        }else{
        	$vueErreur[]="l'action demander n'est pas définie";
        	require_once('vue/vueErreur.php');
        }
    }
}