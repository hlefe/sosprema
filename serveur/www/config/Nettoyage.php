<?php
/**
 * Classe Nettoyage
 *
 * Regroupe toutes les fonctions qui concernent le nettoyage de variables provenants de champs html
 */
class Nettoyage {
    /**
    * Fonction de nettoyage email
    * 
    * Nettoie une adresse email donné en paramétre, et retourne true si elle est valide ou false sinon.
    * @param string $email L'adresse mail à nettoyer 
    * @return string L'adresse nettoyée
    */
	public static function nettoyerEmail($email){
		return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

	/*
    * Fonction de nettoyage chaine
    *
    * nettoie une chaine de caractére donné en paramétre, et retourne true si elle est valide ou false sinon. 
    * @param string $chaine la chaine à nettoyer
    * @return string La chaine nettoyée
    */
	public static function nettoyerChaine($chaine){
		return filter_var($chaine, FILTER_SANITIZE_STRING);
	}
    
    /*
    * Fonction de nettoyage int
    *
	* nettoie un nombre entier donné en paramétre, et retourne true si il est valide ou false sinon.
	*@param int $nombre Le INT à nettoyer 
    * @return int Le INT nettoyé
    */
    public static function nettoyerNombreEntier($nombre){
		return filter_var($nombre, FILTER_SANITIZE_NUMBER_INT);
	}

    /*
    * Fonction de nettoyage d'URL
    *
	* nettoie une adresse url donné en paramétre, et retourne true si elle est valide ou false sinon.
	* @param string $url L'url à nettoyer
    * @return string L'url nettoyée
    */
    public static function nettoyerURL($url){
		return filter_var($url, FILTER_SANITIZE_URL);
	}

    /*
    * Fonction de nettoyage de float
    *
    * nettoie un nombre réel donné en paramétre, et retourne true si il est valide ou false sinon.
    * @param string $url Le float à nettoyer
    * @return string Le float nettoyée
    */
	public static function nettoyerNombreReel($url){
		return filter_var($url, FILTER_SANITIZE_NUMBER_FLOAT);
	}
}