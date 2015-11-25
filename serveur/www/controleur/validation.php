<?php

class validation {
	
	//valide une adresse email donné en paramétre, et retourne true si elle est valide ou false sinon.
	public static function validerEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL)==false?false:true;
	}

	//valide un nombre entier donné en paramétre, et retourne true si il est valide ou false sinon.
	public static function validerNombreEntier($nombre){
		return filter_var($nombre, FILTER_VALIDATE_INT)==false?false:true;
	}

	//valide une adresse url donné en paramétre, et retourne true si elle est valide ou false sinon.
	public static function validerURL($url){
		return filter_var($url, FILTER_VALIDATE_URL)==false?false:true;
	}

	//valide un nombre réel donné en paramétre, et retourne true si il est valide ou false sinon.
	public static function validerNombreReel($url){
		return filter_var($url, FILTER_VALIDATE_FLOAT)==false?false:true;
	}
}