<?php

/**
 * 
 */
class controleurBenevol {

    public function __construct()
    {
        try {
            $action = $_REQUEST['action'];
                
            switch ($action) {
                
                case 'accueil':
                    $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
                    require_once('vue/accueil.php');
                    break;

                case 'vueConnexion':
                    require_once('vue/login.php');
                    break;

                case 'profil':
                    $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
                    require_once('vue/profil.php');
                    break;

                case 'vueModifierMotDePasse':
                    $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
                    require_once('vue/modifierMDP.php');
                    break;
                
                case 'connexion':
                    try {
                        $this->validationFormulaireConnexion();
                    }catch(PDOException $ex){
                        echo $ex;
                    }                 
                    break;

                case 'deconnexion':
                    $this->detruireSession();             
                    break;

                case 'modifierUtilisateur':
                    try {
                        $this->modifierUtilisateur();
                        
                    } catch(PDOException $ex){
                        $vueErreur[] = "Erreur de base de donnée, PDOException.";
                        require_once('vue/profil.php');
                    }
                    break;

                case 'modifierMotDePasse':
                    try {
                        $message = $this->modifierMotDePasse();
                    } catch(PDOException $ex){
                        $vueErreur[] = "Erreur base de donnée, PDOException";
                        require_once('vue/modifierMDP.php');
                    }
                    break;

                default :
                    $vueErreur[] = "Probleme l'action n'est pas définie.";
                    require_once('vue/vueErreur.php');
            }
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            require_once('vue/vueErreur.php');
        } catch (Exception $ex) {
            $vueErreur[] = "Erreur inattendue";
            require_once('vue/vueErreur.php');
        }
    }

    public function validationFormulaireConnexion() {
        if (isset($_POST['emailConnexion']) && !$_POST['emailConnexion']=="") {
            
            $emailConnexion = nettoyage::nettoyerEmail($_POST['emailConnexion']);

            if (validation::validerEmail($emailConnexion)) {
                if (isset($_POST['passwordConnexion'])|| !$_POST['passwordConnexion']=="") {
                    $passwordConnexion = nettoyage::nettoyerChaine($_POST['passwordConnexion']);
                    if (validation::validerPassword($passwordConnexion)) {
                        $utilisateur = modelUtilisateur::creationUtilisateurConnecter($emailConnexion, $passwordConnexion);
                        if ($utilisateur != FALSE) {
                            $_SESSION['utilisateurConnecter'] = $utilisateur;
                            $utilisateurConnecter = $utilisateur;
                            if($utilisateurConnecter->verifierMotDePasse('SosPrema')){
                                $vueConfirmation[]="Bienvenue pour votre premiére connexion, veuiller modifier votre mot de passe.";
                                require_once('vue/modifierMDP.php');
                                return;
                            }
                            require_once('vue/accueil.php');
                            return;
                        } else {
                            $vueErreur[] = "erreur de mot de passe ou d'adresse mail.";
                            require_once('vue/login.php');
                            return;
                        }
                    }
                }else
                    $vueErreur[] = "veuiller renseigner un mot de passe.";
                    require_once('vue/login.php');
                    return;
            }
        } else {
            $vueErreur[] = "veuiller renseigner une adresse mail.";
            require_once('vue/login.php');
            return;
        }
    }

    public function modifierUtilisateur() {
        
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        if(!isset($_POST['nom'])|| $_POST['nom']==""){
            $vueErreur[] = "Veuiller renseigner un nom.";
            require_once('vue/profil.php');
            return;
        }
        else
            $nom = nettoyage::nettoyerChaine($_POST['nom']);

        if(!isset($_POST['prenom'])|| $_POST['prenom']==""){
            $vueErreur[] = "Veuiller renseigner un prenom.";
            require_once('vue/profil.php');
            return;
        }
        else
            $prenom = nettoyage::nettoyerChaine($_POST['prenom']);

        
        if(!isset($_POST['email'])|| $_POST['email']==""){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/profil.php');
            return;
        }
        else
            if(validation::validerEmail($_POST['email'])){
                $email = nettoyage::nettoyerChaine($_POST['email']);
                if($email != $utilisateurConnecter->email){
                    if(modelUtilisateur::verifierEmailNonPresent($email)){
                        $vueErreur[] = "Un utilisateur existe déjà avec l'adresse email correspondante.";
                        require_once('vue/profil.php');
                        return;
                    }
                }
            }else{
                $vueErreur[] = "Veuiller renseigner une adresse mail valide.";
                require_once('vue/profil.php');
                return;
        }
        if(isset($_POST['numRue']))
            $numRue=nettoyage::nettoyerChaine($_POST['numRue']);
        else
            $numRue=NULL;

        if(isset($_POST['nomRue']))
            $nomRue=nettoyage::nettoyerChaine($_POST['nomRue']);
        else
            $nomRue=NULL;

        if(isset($_POST['codePostal']))
            $code_postal=nettoyage::nettoyerChaine($_POST['code_postal']);
        else
            $code_postal=NULL;

        if(isset($_POST['nomVille']))
            $nomVille=nettoyage::nettoyerChaine($_POST['nomVille']);
        else
            $nomVille=NULL;

         if(isset($_POST['nomRegion']))
            $nomRegion=nettoyage::nettoyerChaine($_POST['nomRegion']);
        else
            $nomRegion=NULL;

         if(isset($_POST['nomDepartement']))
            $nomDepartement=nettoyage::nettoyerChaine($_POST['nomDepartement']);
        else
            $nomDepartement=NULL;

        if(isset($_POST['dateDeNaissance']))
            $dateDeNaissance=nettoyage::nettoyerChaine($_POST['dateDeNaissance']);
        else
            $dateDeNaissance=NULL;
        if(isset($_POST['avatar']))
            $avatar=nettoyage::nettoyerChaine($_POST['avatar']);
        else
            $avatar=NULL;
        if(isset($_POST['profession']))
            $profession=nettoyage::nettoyerChaine($_POST['profession']);
        else
            $profession=NULL;

        if(isset($_POST['divers']))
            $divers=nettoyage::nettoyerChaine($_POST['divers']);
        else
            $divers=NULL;

        if(isset($_POST['libelle_niveau']))
            $idNiveau=modelNiveau::rechercherId(nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau=false){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à se libelle";
                require_once('vue/profil.php');
                return;
            }
        else{
            $idNiveau=modelNiveau::rechercherId('utilisateur');
        }


        try{
            modelUtilisateur::modifierUtilisateur($email,$nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $code_postal,$profession,$divers,$avatar,$idNiveau,$idFamille=null,$nomVille,$nomDepartement,$nomRegion);
            
            $vueConfirmation[] = "L'utilisateur à bien été ajouté.";
            require_once('vue/profil.php');
        } catch(PDOException $ex){
            $vueErreur[] = $ex;
            require_once('vue/profil.php');
        }
    }

    public function modifierMotDePasse(){
        
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'aviez pas à avoir accés à cette partie du site";
            require_once('vue/login.php');
            return;
        }

        if(isset($_POST['oldMDP']) || !$_POST['oldMDP']==""){
            $oldMDP = nettoyage::nettoyerChaine($_POST['oldMDP']);
            if($_SESSION['utilisateurConnecter']->verifierMotDePasse($oldMDP)){

                if(isset($_POST['newMDP']) || !$_POST['newMDP']==""){
                    $newMDP = nettoyage::nettoyerChaine($_POST['newMDP']);
                    if (isset($_POST['newMDPVerif']) || !$_POST['newMDPVerif']==""){
                        $newMDPVerif = nettoyage::nettoyerChaine($_POST['newMDPVerif']);
                        if($newMDP==$newMDPVerif){
                            $mot_de_passe=nettoyage::nettoyerChaine($_POST['newMDP']);

                            if(validation::validerPassword($mot_de_passe) && $mot_de_passe != 'SosPrema'){
                                $_SESSION['utilisateurConnecter'] = modelUtilisateur::modifierMotDePasse($_SESSION['utilisateurConnecter']->userId, $mot_de_passe);
                                $vueConfirmation[] = "votre mot de passe à bien été modifié.";
                                require_once('vue/modifierMDP.php');
                                return;
                            }else{
                                $vueErreur[] = "Nouveau mot de passe invalide.";
                                require_once('vue/modifierMDP.php');
                                return;
                            }
                        }else{
                            $vueErreur[] = "le mot de passe de vérification ne correspond pas au nouveau mot de passe.";
                            require_once('vue/modifierMDP.php');
                            return;
                        }
                    }else{
                        $vueErreur[] = "veuiller renseigner le champ de vérification du nouveau mot de passes.";
                        require_once('vue/modifierMDP.php');
                        return;
                    }
                }else{
                    $vueErreur[] = "veuiller renseigner le champ pour le nouveau mot de passe.";
                    require_once('vue/modifierMDP.php');
                    return;
                }
            } else{
                $vueErreur[] = "l'ancien mot de passe est invalide.";
                require_once('vue/modifierMDP.php');
                return;
            }
        }else{
            $vueErreur[] = "veuiller renseigner votre ancien mot de passe.";
            require_once('vue/modifierMDP.php');
            return;
        }
    }

    public function detruireSession(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        require_once ('vue/login.php');
    }

    
}
