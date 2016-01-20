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
        
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'aviez pas à avoir accés à cette partie du site";
            require_once('vue/login.php');
            return;
        }

        if(!isset($_POST['nom'])|| $_POST['nom']==""){
            $vueErreur[] = "veuiller renseigner un nom.";
            require_once('vue/profil.php');
            return;
        }
        else
            $nom = nettoyage::nettoyerChaine($_POST['nom']);

        if(!isset($_POST['prenom'])|| $_POST['prenom']==""){
            $vueErreur[] = "veuiller renseigner un prenom.";
            require_once('vue/profil.php');
            return;
        }
        else
            $prenom = nettoyage::nettoyerChaine($_POST['prenom']);
        
        if(!isset($_POST['email'])|| $_POST['email']==""){
            $vueErreur[]= "veuiller renseigner une adresse mail";
            require_once('vue/profil.php');
            return;
        }
        else
            if(validation::validerEmail($_POST['email']))
                $email = nettoyage::nettoyerChaine($_POST['email']);
            else{
                $vueErreur[]= "veuiller renseigner une adresse mail valide";
                require_once('vue/profil.php');
                return;
            }
        if(isset($_POST['num_rue']))
            $num_rue=nettoyage::nettoyerChaine($_POST['num_rue']);
        else
            $num_rue=NULL;

        if(isset($_POST['nom_rue']))
            $nom_rue=nettoyage::nettoyerChaine($_POST['nom_rue']);
        else
            $nom_rue=NULL;

        if(isset($_POST['code_postal']))
            $code_postal=nettoyage::nettoyerChaine($_POST['code_postal']);
        else
            $code_postal=NULL;

        if(isset($_POST['ville']))
            $ville=nettoyage::nettoyerChaine($_POST['ville']);
        else
            $ville=NULL;

        $id_niveau_utilisateur=$_SESSION['utilisateurConnecter']->id_groupe;
        
        $avatar = NULL;

        $_SESSION['utilisateurConnecter'] = modelUtilisateur::modifierUtilisateur($_SESSION['utilisateurConnecter']->userId, $prenom, $nom, $email, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar);
        
        $vueConfirmation[] = "Les modifications ont bien été réalisé.";
        require_once('vue/profil.php');
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
