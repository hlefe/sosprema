<?php

require_once(nettoyage.php);
require_once(validation.php);

class sessionUtilisateur{

	public static function creationSessionUtilisateur(){

		if(isset($_POST['emailConnexion'])){

			$emailConnexion = nettoyage::nettoyerEmail($_POST['emailConnexion']);

			if(validation::validerEmail($emailConnexion)){

				if(isset($_POST['passwordConnexion'])){

					$passwordConnexion = nettoyage::nettoyerChaine($_POST['passwordConnexion']);

					if(validation::validerPassword($passwordConnexion)){
						try{
							$utilisateur = new utilisateur($emailConnexion, $passwordConnexion);//a corriger selon le model de valentin
							$_SESSION(['utilisateurConnecter']) = $utilisateur;
						}catch(Exception $e){
							//a corriger
						}			
					}
				}
			}
		}
		//ajouter un code d'erreur
	}
}