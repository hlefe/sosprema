<?php

/**
 * 
 */
class controleurBenevol {

    public function __construct()
    {
        try {
            $vueErreur = array();
            session_start();
            $action = $_REQUEST['action'];
                
            switch ($action) {
                
                case NULL :
                    $vueErreur[] = "Probleme pas d'action";
                    break;
                
                case "validationFormulaire":
                    if($this->validationFormulaireConnexion())
                        header('Location:index.php?vueAppeller=accueil');                    
                    break;

                case "ajouterUtilisateur":
                    $this->ajouterUtilisateur();
                    echo 'utilisateur ajouté';
                    header('Location:index.php?vueAppeller=accueil');                    
                    break;
                case "supprimerUtilisateur":
                    if($this->supprimerUtilisateur()!=FALSE)
                        echo 'utilisateur supprimer';
                        header('Location:index.php?vueAppeller=accueil');                    
                    break;
                case "afficherToutUtilisateur":
                    $listesUsers = $this->afficherToutUtilisateur();
                        //header('Location:vue/accueil.php');       // vue qui affiche la liste des utilisateurs.             
                    break;
                default :
                    $vueErreur[] = "Probleme authentification";
                    header("vue/erreur.php");
            }
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            require_once ("/vue/erreur.php");
        } catch (Exception $ex) {
            $vueErreur[] = "Erreur inattendue";
            require_once ("/vue/erreur.php");
        }
    }

    static function validationFormulaireConnexion() {
                
        if (isset($_POST['emailConnexion'])) {
            
            $emailConnexion = nettoyage::nettoyerEmail($_POST['emailConnexion']);

            if (validation::validerEmail($emailConnexion)) {
                if (isset($_POST['passwordConnexion'])) {
                    $passwordConnexion = nettoyage::nettoyerChaine($_POST['passwordConnexion']);
                    if (validation::validerPassword($passwordConnexion)) {
                        $utilisateurConnecter = modelUtilisateur::creationUtilisateurConnecter($emailConnexion, $passwordConnexion);
                        if ($utilisateurConnecter != FALSE) {
                            $_SESSION['utilisateurConnecter'] = $utilisateurConnecter;
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

    static function ajouterUtilisateur() {
        if(!isset($_POST['nom']))
            echo "veuiller renseigner un nom";
        else
            $nom = nettoyage::nettoyerChaine($_POST['nom']);

        if(!isset($_POST['prenom']))
            echo "veuiller renseigner un prenom";
        else
            $prenom = nettoyage::nettoyerChaine($_POST['prenom']);
        
        if(!isset($_POST['email']))
            echo "veuiller renseigner une adresse mail";
        else
            $email = nettoyage::nettoyerChaine($_POST['email']);
        
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

        if(isset($_POST['id_groupe']))
            $id_groupe=nettoyage::nettoyerChaine($_POST['ville']);
        else
            $id_groupe=NULL;

        $avatar = NULL;

        $mot_de_passe = 'SosPrema';

        modelUtilisateur::creerUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_groupe, $avatar);

    }

    public function supprimerUtilisateur(){
        
        if(!isset($_POST['email']))
            echo "veuiller renseigner une adresse mail";
        else
        $email = nettoyage::nettoyerChaine($_POST['email']);

        modelUtilisateur::supprimerUtilisateur($email);
    }

    public function afficherToutUtilisateur(){
        return modelUtilisateur::afficherToutUtilisateur();
    }
}
