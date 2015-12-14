<?php

session_start();
if(!isset($_SESSION['utilisateurConnecter'])&& $_REQUEST['action']!= 'connexion'){
	require_once('vue/login.php');
	return;
}

$listeActionAdmin = array('gestion','vueAjoutUtilisateur','listeUtilisateurs','ajouterUtilisateur','supprimerUtilisateur','afficherToutUtilisateur');
$listeActionBenevol = array('accueil','vueConnexion','profil','vueModifierMotDePasse','connexion','deconnexion','modifierUtilisateur','modifierMotDePasse');

$action = $_REQUEST['action'];

if(in_array($action, $listeActionAdmin)){
	if(controleurAdmin::verifierDroit()){
		$controleur = new controleurAdmin();
	}
	else{
		$vueErreur[] = "vous ne possédez pas les droits appopriées.";
        require_once ("/vue/erreur.php");
        return;
    }
}elseif(in_array($action, $listeActionBenevol)){
	$controleur = new controleurBenevol();
}else{
	$vueErreur[]="l'action demander n'est pas définie";
	require_once('vue/vueErreur.php');
}
