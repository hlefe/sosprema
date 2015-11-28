<?php

/**
 * cette classe permettra de gérer l'utilisateur qui est connecté
 * @author Nico
 */
class sessionUtilisateur {

    public static function creationSessionUtilisateur() {

        if (isset($_POST['emailConnexion'])) {
            
            $emailConnexion = nettoyage::nettoyerEmail($_POST['emailConnexion']);

            if (validation::validerEmail($emailConnexion)) {

                if (isset($_POST['passwordConnexion'])) {
                    $passwordConnexion = nettoyage::nettoyerChaine($_POST['passwordConnexion']);
                    if (validation::validerPassword($passwordConnexion)) {
                        $utilisateur = utilisateurGateway::rechercherUtilisateurConnexion($emailConnexion, $passwordConnexion);
                        if ($utilisateur != false) {
                            $_SESSION['sessionUtilisateur'] = $utilisateur;
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        } else {
            return false;
        }
    }

}
