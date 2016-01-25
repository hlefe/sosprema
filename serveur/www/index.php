<?php

try {
    ini_set('display_errors', 1);

    session_start();
    
    require_once('config/config.php');

    require_once('config/Autoload.php');
    Autoload::charger();
    
    require_once('controleur/frontControleur.php');
    
    Connexion::connect($dsn, $user, $pswd);
}
catch (PDOException $ex){    
    $vueErreur = $ex->getMessage();
    require 'vue/erreur.php';
}
 ?>