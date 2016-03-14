<?php
/**
* Classe PageGateway
*
* Gateway de Page (intéragit avec cette table en utilisant PDO)
*/
class PageGateway {
    
    public static function rechercherPage($nomPage){
        $querry = 'SELECT * FROM page WHERE id=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomPage,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $page = new Page($result);
        return $page;
    }

    public static function getAll($niveau){
        $querry = 'SELECT * FROM page  WHERE droit<=:niveau';
        Connexion::executeQuerry($querry,  array(':niveau'=>array($niveau,PDO::PARAM_INT)));
        $results = Connexion::getResults();
        return $results;
    }
}