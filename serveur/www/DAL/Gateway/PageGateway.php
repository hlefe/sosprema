<?php
/**
* Classe PageGateway
*
* Gateway de Page (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class PageGateway {
    
    /**
    * Fonction de recherche d'une page du site. 
    * 
    * Permet de rechercher une page du site.
    * @param nomPage correspond au nom de la page recherchée.
    * @return page correspond à la page qui a été recherchée.
    */
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

    /**
    * Fonction de récupération de l'ensemble des pages du site. 
    * 
    * Permet de récupérer l'ensemble des pages du site.
    * @return results correspond à l'ensemble des pages trouvées.
    */
    public static function getAll($niveau){
        $querry = 'SELECT * FROM page  WHERE droit<=:niveau';
        Connexion::executeQuerry($querry,  array(':niveau'=>array($niveau,PDO::PARAM_INT)));
        $results = Connexion::getResults();
        return $results;
    }
}