<?php

session_start();
if(isset($_REQUEST['controleur'])){
	switch ($_REQUEST['controleur']) {
		case 'controleurBenevol':
			$controleur = new controleurBenevol();
			break;

		case 'controleurAdmin':
			if(controleurAdmin::verifierDroit())
			$controleur = new controleurAdmin();
			else
				$vueErreur[] = "vous ne possédez pas les droits appopriées.";
            	require_once ("/vue/erreur.php");
			break;

		default:
			require_once('erreur.php');
			break;
	}
}elseif(isset($_REQUEST['vueAppeller'])&& isset($_SESSION['utilisateurConnecter'])){
	$utilisateurConnecter = $_SESSION['utilisateurConnecter'];
	switch ($_REQUEST['vueAppeller']) {
		case 'accueil':
			require_once('vue/accueil.php');
			break;
		case 'profil':
			require_once('vue/profil.php');
			break;
		case 'gestion':
			if(controleurAdmin::verifierDroit()){
				require_once('vue/gestion.php');;
			}else{
				$vueErreur[] = "vous ne possédez pas les droits appopriées.";
            	require_once ("/vue/erreur.php");
			}
			break;

		case 'erreur':
			$vueErreur = $_REQUEST['erreur'];
			require_once('vue/erreur.php');
			break;

		case 'confirmation':
			$vueConfirmation = $_REQUEST['message'];
			require_once('vue/confirmation.php');
			break;

		case 'modifierMDP':
			require_once('vue/modifierMDP.php');
			break;

		case 'ajoutUtilisateur':
			if(controleurAdmin::verifierDroit()){
				require_once('vue/ajoutUtilisateur.php');
			}else{
				$vueErreur[] = "vous ne possédez pas les droits appopriées.";
            	require_once ("/vue/erreur.php");
			}
			break;
		case 'listeUtilisateurs':
			if(controleurAdmin::verifierDroit()){
				$listeUsers = controleurAdmin::afficherToutUtilisateur();
				require_once('vue/listeUtilisateurs.php');
			}else{
				$vueErreur[] = "vous ne possédez pas les droits appopriées.";
            	require_once ("/vue/erreur.php");
			}
			break;
		default:
			break;
	}
}
else{
	require_once('vue/login.php');
}
