<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nettoyage
 *
 * @author Nico
 */
class nettoyage {
    //nettoie une adresse email donné en paramétre, et retourne true si elle est valide ou false sinon.
	public static function nettoyerEmail($email){
		return filter_var($email, FILTER_SANITIZE_EMAIL)==false?false:true;
        }
        
	//nettoie une chaine de caractére donné en paramétre, et retourne true si elle est valide ou false sinon.
	public static function nettoyerChaine($chaine){
		return filter_var($chaine, FILTER_SANITIZE_STRING)==false?false:true;
	}

	//nettoie un nombre entier donné en paramétre, et retourne true si il est valide ou false sinon.
	public static function nettoyerNombreEntier($nombre){
		return filter_var($nombre, FILTER_SANITIZE_NUMBER_INT)==false?false:true;
	}

	//nettoie une adresse url donné en paramétre, et retourne true si elle est valide ou false sinon.
	public static function nettoyerURL($url){
		return filter_var($url, FILTER_SANITIZE_URL)==false?false:true;
	}

	//nettoie un nombre réel donné en paramétre, et retourne true si il est valide ou false sinon.
	public static function nettoyerNombreReel($url){
		return filter_var($url, FILTER_SANITIZE_NUMBER_FLOAT)==false?false:true;
	}
}
