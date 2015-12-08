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
        if (!isset($_SESSION['utilisateurConnecte'])) {
           include_once('vue/login.php');
        } else {
            include_once('vue/accueil.php');
        }
        
        $action = $_REQUEST['action'];
            
        switch ($action) {
            
            case NULL :
                break;
            
            case "validationFormulaire":
                if(self::validationFormulaireConnexion())
                   
                    include('vue/accueil.php');                    
                break;

            default :
                $vueErreur[] = "Probleme authentification";
                header("vue/erreur.php");
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
                            $_SESSION['utilisateurConnecter'] = $utilisateur;
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
