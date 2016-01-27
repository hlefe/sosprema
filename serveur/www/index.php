<?php

try {
    ini_set('display_errors', 1);
    
    require_once('config/config.php');

    require_once('config/Autoload.php');
    Autoload::charger();
    
    Connexion::connect($dsn, $user, $pswd);
    FrontControleur::init();
    
}
catch (PDOException $ex){    
    $vueErreur = $ex->getMessage();
    require 'vue/erreur.php';
}catch(Exception $e){
	$vueErreur = $ex->getMessage();
    require 'vue/erreur.php';
}
 ?>