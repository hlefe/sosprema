<?php 
/**
 * Cntrôleur global du site
 *
 * Traite les paramètres $_GET.
 * Créer la connexion à la base de données.
 *
 *
 */

	
	require_once('/config/config.php');

    require_once('/config/Autoload.php');
    Autoload::charger();
    $controleur = new controleurBenevol();

	include_once('/modele/index.php');  
    include_once('/controleur/index.php');

 ?>