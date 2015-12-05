<?php
/**
 * Controleur: Fichier principal du controleur.
 *
 */
require_once('/config/nettoyage.php');
require_once('modelUtilisateur.php');
require_once('controleurBenevol.php');
require_once('connexion.php');
require_once('/config/validation.php');
session_start();
if (!isset($_SESSION['sessionUtilisateur'])) {
	include_once('vue/login.php');
}
else {
	include_once('vue/index.php');
}
include_once('vue/index.php'); 	//Affichage de la vue

?>