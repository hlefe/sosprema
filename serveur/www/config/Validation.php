<?php
/**
 * Classe Validation
 *
 * Contient toutes les fonctions permettant de valider des champs
 */
class Validation {
    /**
    * Fonction de validation email
    * 
    * Valide une adresse email donné en paramétre, et retourne true si elle est valide ou false sinon.
    * @param string $email L'adresse mail à nettoyer 
    * @return string L'adresse nettoyée
    */
    public static function validerEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) === false ? false : true;
    }

    /*
    * Fonction de validation int
    *
	* valide un nombre entier donné en paramétre, et retourne true si il est valide ou false sinon.
	*@param int $nombre Le INT à nettoyer 
    * @return int Le INT nettoyé
    */
	public static function validerNombreEntier($nombre) {
        return filter_var($nombre, FILTER_VALIDATE_INT) == false ? false : true;
    }

    /*
    * Fonction de validation d'URL
    *
	* valide une adresse url donné en paramétre, et retourne true si elle est valide ou false sinon.
	* @param string $url L'url à nettoyer
    * @return string L'url nettoyée
    */
    public static function validerURL($url) {
        return filter_var($url, FILTER_VALIDATE_URL) == false ? false : true;
    }

    /*
    * Fonction de validation de float
    *
    * valide un nombre réel donné en paramétre, et retourne true si il est valide ou false sinon.
    * @param string $url Le float à nettoyer
    * @return string Le float nettoyée
    */  
    public static function validerNombreReel($nombre) {
        return filter_var($nombre, FILTER_VALIDATE_FLOAT) == false ? false : true;
    }
    
    /*
     *Fonction de validation d'un mot de passe
    *
    * valide un mot de passe donné en paramétre, et retourne true si il est valide ou false sinon.
    * @param string $password le mdp à nettoyer
    * @return string Le mdp nettoyée
    */
    //valide un mot de passe donné en paramétre, et retourne true si il est valide ou false sinon.
    public static function validerPassword($password) {
        return $password;
        //return filter_var($password, "/([:alnum:]|[:punct:]){8,20}/") == false ? false : true; //à vérifier
    }

    public static function validerTelephone($telephone) {
        return filter_var($telephone, "/[:digit:]{10}/") == false ? false : true;
    }
}