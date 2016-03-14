<?php
/**
 * Classe VariableExterne
 *
 * Regroupe toutes les fonctions qui concernent la gestionn des variables à nettoyer/valider
 */
class VariableExterne{
	/**
    * Fonction verifChampObligatoire
    *
    * Permet de vérifier les champs obligatoires d'un formulaire, retourne la variable si elle n'est pas vide ou sinon une exception.
    * @param string $nomChamp Le nom du champs
    * @param strin $nomVariable Le nom de la variable
    * @return string La chaine nettoyée
    */
	public static function verifChampObligatoire ($nomChamp, $nomVariable) {
		if(!isset($_POST[$nomVariable])|| $_POST[$nomVariable]==""){
            throw new Exception("Veuiller renseigner ".$nomChamp.".", 1);
        }
        else{
            return Nettoyage::nettoyerChaine($_POST[$nomVariable]);
        }
	}
    
    /**
    * Fonction verifChampOptionnel
    *
    * Permet de verifier et de nettoyer les champs optionnel d'un formulaire, retourne la valeur de la variable ou null sinon.
    * @param string $nomVariable Le nom de la variable
    * @return string La chaine nettoyée 
    */
	public static function verifChampOptionnel ($nomVariable) {
		if(isset($_POST[$nomVariable]))
            return Nettoyage::nettoyerChaine($_POST[$nomVariable]);
        else
            return NULL;
	}
    
    /**
    * Fonction verifChampAvatar
    *
    * Permet de vérifier le champ avatar 
    * @param string $nomVariable Le nom de la variable
    * @paramm string $ancien L'ancien avatar
    * @return string $ancien L'ancien avatar si ça n'a pas changé
    * @return string $nom Le nouvel avatar si ça a changé
    */
    public static function verifChampAvatar($nomVariable, $ancien){
         //Si le champ est une image (avatar par exemple) donc un type $_FILES
         if(isset($_FILES[$nomVariable])) {
            //vérification des erreurs de fichier
            switch ($_FILES[$nomVariable]['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    return $ancien;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    return $ancien;
                default:
                    return $ancien;
            }
            //Upload fichier
                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                $extension = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
                $chemin_destination = 'content/avatars/';     
                $md5 = md5(uniqid(rand(), true));
                $nom = $chemin_destination. $md5 . "." . $extension;
                $res = move_uploaded_file($_FILES['avatar']['tmp_name'], $nom);     
            //Retourne le lien du fichier          
           return $nom;
        }
    }

    /**
    * Fonction verifChampEmail
    *
    * 
    * @param string $nomVariable
    * @param strin $emailAComparer L'email à vérifier
    * @return string $email L'email vérifié
    */
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

    /**
    * Fonction verifChampPassword
    *
    * Permet de vérifier le champ de mot de passe
    * @param string $nomChamp Le nom du champ
    * @param string $nomVariable Le nom de la variable
    * @return string $_POST[$nomVariable] Le contenu de la variable
    */
    public static function verifChampPassword ($nomChamp, $nomVariable){
        if($_POST[$nomVariable] != null)
            if(Validation::validerPassword($_POST[$nomVariable])){
                return $_POST[$nomVariable];
            }else{
                throw new Exception("Votre mot de passe est invalide.", 1);
            }   
    }
}