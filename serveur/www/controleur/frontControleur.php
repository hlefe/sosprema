<?php


if(isset($_REQUEST['controleur'])){
	switch ($_REQUEST['controleur']) {
		case 'controleurBenevol':
			$controleur = new controleurBenevol();
			break;

		default:
			require_once('erreur.php');
			break;
	}
}elseif(isset($_REQUEST['vueAppeller'])){
	switch ($_REQUEST['vueAppeller']) {
		case 'accueil':
			require_once('vue/accueil.php');
			break;

		case 'gestion':
			require_once('vue/gestion.php');
			break;

		case 'ajoutUtilisateur':
			require_once('vue/ajoutUtilisateur.php');
			break;
		default:
			break;
	}
}
else{
	require_once('vue/login.php');
}
