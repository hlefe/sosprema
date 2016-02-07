<?php

class ModelSession {
	
	public static function creationUtilisateurConnecter() {
        $emailConnexion = VariableExterne::verifChampEmail('emailConnexion', 'connexion');
        $passwordConnexion = VariableExterne::verifChampPassword('mot de passe', 'passwordConnexion');
        $utilisateurConnecter = UtilisateurGateway::rechercheUtilisateurConnexion($emailConnexion, $passwordConnexion);
        if($utilisateurConnecter == false){
            throw new Exception("Erreur de login ou de mot de passe.", 1);
        }

        if($utilisateurConnecter->idAdresse!=NULL){
            $adresse = AdresseGateway::rechercherAdresseById($utilisateur->idAdresse);
            $ville = VilleGateway::rechercherVilleById($adresse['idVille']);
            $departement = DepartementGateway::rechercherDepartementById($ville['idDepartement']);
            $region = RegionGateway::rechercherRegionById($departement['idRegion']);
            $userAdresse = array('numRue' => $adresse['numRue'], 
                                                  'nomRue' => $adresse['nomRue'],
                                                  'codePostal' => $ville['codePostal'],
                                                  'nomVille' => $ville['nomVille'],
                                                  'nomDepartement' => $departement['nomDepartement'],
                                                  'nomRegion' => $regio['nomRegion']);
            $utilisateurConnecter->adresse = new Adresse($userAdresse);
        }
        
        $_SESSION['utilisateurConnecter'] = $utilisateurConnecter;
        return $utilisateurConnecter;
    }

}