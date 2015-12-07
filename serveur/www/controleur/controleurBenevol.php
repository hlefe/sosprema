<?php

/**
* 
*/
class controleurBenevol {
	
	function __construct()
	{
            $vueErreur=array();
            session_start();
        
        try{
            $action = $_REQUEST['action'];
            
            switch($action){
                case "validationFormulaire":
                    $this->validationFormulaireConnexion();
                    break;
                    
                default :
                    $vueErreur[]="Problème authentification";
                    require ("../vue/erreur.php");
            }
        }
        catch (Exception $ex) {
            $vueErreur[]="Erreur inattendue";
            require ("../vue/erreur.php");
        }
    }

	static function validationFormulaireConnexion()
        {
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
