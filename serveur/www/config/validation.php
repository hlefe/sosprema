<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validation
 *
 * @author Nico
 */
class validation {

    //valide une adresse email donné en paramétre, et retourne true si elle est valide ou false sinon.
    public static function validerEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) === false ? false : true;
    }

    //valide un nombre entier donné en paramétre, et retourne true si il est valide ou false sinon.
    public static function validerNombreEntier($nombre) {
        return filter_var($nombre, FILTER_VALIDATE_INT) == false ? false : true;
    }

    //valide une adresse url donné en paramétre, et retourne true si elle est valide ou false sinon.
    public static function validerURL($url) {
        return filter_var($url, FILTER_VALIDATE_URL) == false ? false : true;
    }

    //valide un nombre réel donné en paramétre, et retourne true si il est valide ou false sinon.
    public static function validerNombreReel($nombre) {
        return filter_var($nombre, FILTER_VALIDATE_FLOAT) == false ? false : true;
    }

    //valide un mot de passe donné en paramétre, et retourne true si il est valide ou false sinon.
    public static function validerPassword($password) {
        return $password;
        //return filter_var($password, "/([:alnum:]|[:punct:]){8,20}/") == false ? false : true; //à vérifier
    }

    public static function validerTelephone($telephone) {
        return filter_var($telephone, "/[:digit:]{10}/") == false ? false : true;
    }
}