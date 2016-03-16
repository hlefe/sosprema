<?php
/**
* Classe ModelPage
*
* Modèle pour Page
* @package modele
*/
class ModelPage {
    
    /**
    * Fonction de récupération de l'ensemble des pages. 
    * 
    * Permet de récupérer l'ensemble des pages de la base.
    * @param utilisateur correspond àl'utilisateur connester on l'utilise pour vérifier ses droits.
    * @return l'ensemble des pages trouvé.
    */
    public static function obtenirTout($utilisateur) {
        $pages = PageGateway::getAll($utilisateur->idNiveau);
        return $pages;
    }
    
    /**
    * Fonction de recherche d'une page. 
    * 
    * Permet de rechercher une page grace à son id.
    * @param id correspond à l'id de la page rechercher.
    * @return page est la page trouver correspondant à l'id.
    */
    public static function rechercherPage($id){
        $page = PageGateway::rechercherPage($id);
        return $page;
    }
}