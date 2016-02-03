<?php

class VariableExterne{
	
	//permet de vérifier les champs obligatoires d'un formulaire, retourne la variable si elle n'est pas vide ou sinon une exception.
	public static function verifChampObligatoire ($nomChamp, $nomVariable) {
		if(!isset($_POST[$nomVariable])|| $_POST[$nomVariable]==""){
            throw new Exception("Veuiller renseigner ".$nomChamp.".", 1);
        }
        else{
            return Nettoyage::nettoyerChaine($_POST[$nomVariable]);
        }
	}

	//permet de verifier et de nettoyer les champs optionnel d'un formulaire, retourne la valeur de la variable ou null sinon
	public static function verifChampOptionnel ($nomVariable) {
		if(isset($_POST[$nomVariable]))
            return Nettoyage::nettoyerChaine($_POST[$nomVariable]);
            
        //Si le champ est une image (avatar par exemple) donc un type $_FILES
        elseif(isset($_FILES[$nomVariable])) {
            //Upload fichier
                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                $extension = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
                $chemin_destination = 'content/avatars/';     
                mkdir($chemin_destination, 0777, true);
                $md5 = md5(uniqid(rand(), true));
                $nom = $chemin_destination. $md5 . "." . $extension;
                $res = move_uploaded_file($_FILES['avatar']['tmp_name'], $nom);     
            //Retourne le lien du fichier
           return $nom;
        }
        else
            return NULL;
	}

	//permet de verifier le champ email.
	public static function verifChampEmail ($nomVariable, $emailAComparer) {
		if(!isset($_POST[$nomVariable])|| $_POST[$nomVariable]==""){
            throw new Exception("Veuiller renseigner une adresse mail.", 1);
        }
        else{
            if(Validation::validerEmail($_POST[$nomVariable])){
                $email = Nettoyage::nettoyerChaine($_POST[$nomVariable]);
                if($email != $emailAComparer && $emailAComparer == null){
                    if(ModelGestionUtilisateur::verifierEmailNonPresent($email)){
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

    public static function verifChampPassword ($nomChamp, $nomVariable){
        $password = VariableExterne::verifChampObligatoire($nomChamp, $nomVariable);
        if($password != null)
            if(Validation::validerPassword($password)){
                return $password;
            }else{
                throw new Exception("Votre mot de passe est invalide.", 1);
            }   
    }
}