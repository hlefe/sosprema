<?php

class variableExterne{
	
	//permet de vérifier les champs obligatoires d'un formulaire, retourne la variable si elle n'est pas vide ou sinon une exception.
	public static function verifChampObligatoire ($nomChamp, $nomVariable) {
		if(!isset($_POST[$nomVariable])|| $_POST[$nomVariable]==""){
            throw new Exception("Veuiller renseigner ".$nomChamp.".", 1);
        }
        else{
            return nettoyage::nettoyerChaine($_POST[$nomVariable]);
        }
	}

	//permet de verifier et de nettoyer les champs optionnel d'un formulaire, retourne la valeur de la variable ou null sinon
	public static function verifChampOptionnel ($nomVariable) {
		if(isset($_POST[$nomVariable]))
            return nettoyage::nettoyerChaine($_POST[$nomVariable]);
        else
            return NULL;
	}

	public static function verifChampEmail ($nomVariable, $emailAComparer) {
		if(!isset($_POST[$nomVariable])|| $_POST[$nomVariable]==""){
            throw new Exception("Veuiller renseigner une adresse mail.", 1);
        }
        else{
            if(validation::validerEmail($_POST[$nomVariable])){
                $email = nettoyage::nettoyerChaine($_POST[$nomVariable]);
                if($email != $emailAComparer){
                    if(modelUtilisateur::verifierEmailNonPresent($email)){
                        throw new Exception("Un utilisateur existe déjà avec l'adresse email correspondante.", 1);
                    }else{
                    	return $email;
                    }
                }else{
                	return $email;
                }
            }else{
                throw new Exception("Veuiller renseigner une adresse mail valide.", 1);
       		}
       	}
    }
}