<?php

/**
 * 
 */
class controleurBenevol {

    public function __construct()
    {
        try {
        $vueErreur = array();
        session_start();
        echo 'controleur';
        //if (!isset($_SESSION['utilisateurConnecté'])) {
           include_once('vue/login.php');
        //} else {
        //    include_once('vue/accueil.php');
        //}
        
        echo 'test';
        $action = $_REQUEST['action'];
            
        switch ($action) {
            
            case NULL :
                break;
            
            case "validationFormulaire":
                echo 'validation du formulaire';
                if(self::validationFormulaireConnexion())
                    require 'vue/accueil.php';
                    echo 'Ca marche';
                break;

            default :
                $vueErreur[] = "Problème authentification";
                require ("/vue/erreur.php");
        }
        } catch (Exception $ex) {
            $vueErreur[] = "Erreur inattendue";
            require ("/vue/erreur.php");
        }
    }

    static function validationFormulaireConnexion() {
                
        if (isset($_POST['emailConnexion'])) {
            
            $emailConnexion = nettoyage::nettoyerEmail($_POST['emailConnexion']);

            if (validation::validerEmail($emailConnexion)) {

                if (isset($_POST['passwordConnexion'])) {
                    $passwordConnexion = nettoyage::nettoyerChaine($_POST['passwordConnexion']);
                    if (validation::validerPassword($passwordConnexion)) {
                        $utilisateur = modelUtilisateur::creationUtilisateurConnecter($emailConnexion, $passwordConnexion);
                        if ($utilisateur != FALSE) {
                            echo 'not false';
                            $_SESSION['utilisateurConnecter'] = $utilisateur;
                            echo 'true';
                            return TRUE;
                        } else {
                            return FALSE;
                        }
                    }
                }
            }
        } else {
            return FALSE;
        }
    }

}
