<?php

class PageGateway {
    
    public static function rechercherPage($nomPage){
        $querry = 'SELECT * FROM page WHERE id=:nom';
        Connexion::executeQuerry($querry, array(':nom'=>array($nomPage,PDO::PARAM_INT)));
        $result = Connexion::getResult();
        if ($result == false){
            return false;
        }
        $page = new page($result);
        return $page;
    }

    public static function getAll($niveau){
        $querry = 'SELECT * FROM page  WHERE droit<=:niveau';
        Connexion::executeQuerry($querry,  array(':niveau'=>array($niveau,PDO::PARAM_INT)));
        $results = Connexion::getResults();
        return $results;
    }
}