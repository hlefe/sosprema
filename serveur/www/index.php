<?php 
/**
 * Cntrôleur global du site
 *
 * Traite les paramètres $_GET.
 * Appele le contrôleur correspondant en fonction de la page demandée. 
 * Créer la connexion à la base de données.
 *
 *
 */
include_once('modele/connexion_sql.php');
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/index.php');
}
 ?>