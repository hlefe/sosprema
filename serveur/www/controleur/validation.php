<?php

public class validation {
	
	//valide une adresse email donné en paramétre, et retourne l'email valider ou affiche une erreur.
	public static function validerEmail($email){
		if(isset($email)){
			return filter_var($email, FILTER_VAR_EMAIL);
		}
		else
			echo "ceci n'est pas une adresse email valide";
	}

	//valide une chaine de caractére donné en paramétre, et retourne la chaine de caractére valider ou affiche une erreur.
	public static function validerChaine($chaine){
		if(isset($chaine)){
			return filter_var($chaine, FILTER_VAR_STRING);
		}
		else
			echo "ceci n'est pas une chaîne de caractère valide";
	}

	//valide un nombre donné en paramétre, et retourne le nombre valider ou affiche une erreur.
	public static function validerNombre($nombre){
		if(isset($nombre)){
			return filter_var($nombre, FILTER_VAR_INT);
		}
		else
			echo "ceci n'est pas un nombre valide";
	}

	//valide une adresse url donné en paramétre, et retourne l'url valider ou affiche une erreur.
	public static function validerURL($url){
		if(isset($url)){
			return filter_var($url, FILTER_VAR_URL);
		}
		else
			echo "ceci n'est pas une url valide";
	}
}