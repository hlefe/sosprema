<?php
/**
 * Chargement du site
 *
 * Ce fichier a pour objectif d'appeler les fichiers de conf et l'autoload, et d'appeller le frontControlleur
 */
try {
    ini_set('display_errors', 1);
    
    require_once('config/Config.php');

    require_once('config/Autoload.php');
    Autoload::charger();
    
    Connexion::connect($dsn, $user, $pswd);
    FrontControleur::init();
    
}
catch (PDOException $ex){    
    $vueErreur = $ex->getMessage();
    require 'vue/includes/erreur.php';
}catch(Exception $e){
	$vueErreur = $ex->getMessage();
    require 'vue/includes/erreur.php';
}
 ?>