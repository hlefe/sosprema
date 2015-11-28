<?php
/**
 * Controleur: Fichier principal du controleur.
 *
 */
include_once('nettoyage.php');
include_once('sessionUtilisateur.php');
include_once('validation.php');
if (!isset($_SESSION['sessionUtilisateur'])) {
	include_once('vue/login.php');
}
else {
	include_once('vue/index.php');
}
include_once('vue/index.php'); 	//Affichage de la vue

?>