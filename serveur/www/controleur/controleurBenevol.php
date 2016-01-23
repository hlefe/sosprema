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
            $vueErreur[] = $ex;
            require_once('vue/vueErreur.php');
        } catch (Exception $ex) {
            $vueErreur[] = "Erreur inattendue";
            require_once('vue/vueErreur.php');
        }
    }

    //permet de valider le formulaire de connexion et de créer la session de l'utilisateur.
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
                            
                        } 
                    }
                }
            }
        }
        $vueErreur[] = "votre adresse email ou votre mot de passe est invalide.";
        require_once('vue/login.php');
    }

    // permet à l'utilisateur de modifier ses données perso.
    public function modifierUtilisateur() {
        
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];


        try{
            $nom = variableExterne::verifChampObligatoire('nom','nom');
            $prenom =variableExterne::verifChampObligatoire('prenom','prenom');
            $email = variableExterne::verifChampEmail('email', $utilisateurConnecter->email);
        }catch(Exception $e){
            $vueErreur[]=$e;
            require_once('vue/profil.php');
            return;
        }
        
            $numRue=variableExterne::verifChampOptionnel('numRue');
            $nomRue=variableExterne::verifChampOptionnel('nomRue');
            $code_postal=variableExterne::verifChampOptionnel('codePostal');
            $nomVille=variableExterne::verifChampOptionnel('nomVille');
            $nomRegion=variableExterne::verifChampOptionnel('nomRegion');
            $nomDepartement=variableExterne::verifChampOptionnel('nomDepartement');
            $dateDeNaissance=variableExterne::verifChampOptionnel('dateDeNaissance');
            $avatar=variableExterne::verifChampOptionnel('avatar');     
            $profession=variableExterne::verifChampOptionnel('profession');
            $divers=variableExterne::verifChampOptionnel('divers');


        if(isset($_POST['libelle_niveau']))
            $idNiveau=modelNiveau::rechercherId(nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau=false){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à se libelle";
                require_once('vue/profil.php');
                return;
            }
        else{
            $idNiveau = $utilisateurConnecter->idNiveau;
        }


        try{
            $_SESSION['utilisateurConnecter'] = modelUtilisateur::modifierUtilisateur($utilisateurConnecter->userId,$email,$nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $code_postal,$profession,$divers,$avatar,$idNiveau,$idFamille=null,$nomVille,$nomDepartement,$nomRegion);
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
            $vueConfirmation[] = "L'utilisateur à bien été modifié.";
            require_once('vue/profil.php');
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            $vueErreur[] = $ex;
            require_once('vue/profil.php');
        }
    }

    //permet à l'utilisateur de modifier son mot de passe.
    public function modifierMotDePasse(){
        
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas à avoir accés à cette partie du site";
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
                            }else{
                                $vueErreur[] = "Nouveau mot de passe invalide.";
                            }
                        }else{
                            $vueErreur[] = "le mot de passe de vérification ne correspond pas au nouveau mot de passe.";
                        }
                    }else{
                        $vueErreur[] = "veuiller renseigner le champ de vérification du nouveau mot de passes.";
                    }
                }else{
                    $vueErreur[] = "veuiller renseigner le champ pour le nouveau mot de passe.";
                }
            } else{
                $vueErreur[] = "l'ancien mot de passe est invalide.";
            }
        }else{
            $vueErreur[] = "veuiller renseigner votre ancien mot de passe.";
        }
            require_once('vue/modifierMDP.php');
    }

    public function detruireSession(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        require_once ('vue/login.php');
    }

    
}
