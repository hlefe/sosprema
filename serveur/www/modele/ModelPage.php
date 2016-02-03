<?php

class ModelPage {
    
    public static function obtenirTout($utilisateur) {
        $pages = PageGateway::getAll($utilisateur->idNiveau);
        return $pages;
    }
    
    public static function rechercherPage($id){
        $page = PageGateway::rechercherPage($id);
        return $page;
    }
}