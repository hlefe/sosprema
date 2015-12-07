<?php
/**
 * Cntrôleur global du site
 *
 * Traite les paramètres $_GET.
 * Créer la connexion à la base de données.
 *
 *
 */
    //affiche les erreurs à l'écran
    ini_set('display_errors', 1);


    require_once('config/config.php');

    require_once('config/Autoload.php');
    Autoload::charger();
    $controleur = new controleurBenevol();


 ?>