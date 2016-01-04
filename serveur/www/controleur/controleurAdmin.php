<?php

/**
 * 
 */
class controleurAdmin {

    public function __construct()
    {
        try {
            $action = $_REQUEST['action'];
                
            switch ($action) {
                
                case 'gestion':

                    $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
                    require_once('vue/gestion.php');
                    break;

                case 'vueAjoutUtilisateur':
                        
                    $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
                    $allNiveau=modelNiveau::getAll();
                    require_once('vue/ajoutUtilisateur.php');
                    
                    break;

                case 'listeUtilisateurs':
                    
                    $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
                    $listeUsers = controleurAdmin::afficherToutUtilisateur();
                    require_once('vue/listeUtilisateurs.php');
                    
                    break;

                case 'ajouterUtilisateur':
                     $this->ajouterUtilisateur();
                    
                    break;

                case 'supprimerUtilisateur':
                    $this->supprimerUtilisateur();
                    break;

                case 'afficherToutUtilisateur':
                    $listesUsers = $this->afficherToutUtilisateur();      
                    break;

                case 'vueAdminModifierUtilisateur':
                    $this->vueAdminModifierUtilisateur();
                    break;

                case 'adminModifierUtilisateur':
                    $this->adminModifierUtilisateur();
                    break;

                default :
                    $vueErreur[] = "Probleme pas d'action valide.";
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

    public function ajouterUtilisateur() {
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        if(!isset($_POST['nom'])|| $_POST['nom']==""){
            $vueErreur[] = "Veuiller renseigner un nom.";
            require_once('vue/ajoutUtilisateur.php');
            return;
        }
        else
            $nom = nettoyage::nettoyerChaine($_POST['nom']);

        if(!isset($_POST['prenom'])|| $_POST['prenom']==""){
            $vueErreur[] = "Veuiller renseigner un prenom.";
            require_once('vue/ajoutUtilisateur.php');
            return;
        }
        else
            $prenom = nettoyage::nettoyerChaine($_POST['prenom']);
        
        if(!isset($_POST['email'])|| $_POST['email']==""){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/ajoutUtilisateur.php');
            return;
        }
        else
            if(validation::validerEmail($_POST['email'])){
                $email = nettoyage::nettoyerChaine($_POST['email']);
                if(modelUtilisateur::verifierEmailNonPresent($email)){
                    $vueErreur[] = "Un utilisateur existe déjà avec l'adresse email correspondante.";
                    require_once('vue/ajoutUtilisateur.php');
                    return;
                }
            }else{
                $vueErreur[] = "Veuiller renseigner une adresse mail valide.";
                require_once('vue/ajoutUtilisateur.php');
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

        if(isset($_POST['libelle_niveau']))
            $id_niveau_utilisateur=modelNiveau::rechercherId(nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($id_niveau_utilisateur=false){
                $vueErreur[] = "Un utilisateur existe déjà avec l'adresse email correspondante.";
                require_once('vue/ajoutUtilisateur.php');
                return;
            }
        else{
            $id_niveau_utilisateur=modelNiveau::rechercherId('utilisateur');
        }
        $avatar = NULL;

        $mot_de_passe = 'SosPrema';

        try{
            modelUtilisateur::creerUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar);
            
            $vueConfirmation[] = "L'utilisateur à bien été ajouté.";
            require_once('vue/ajoutUtilisateur.php');
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            require_once('vue/ajoutUtilisateur.php');
        }

    }

    public function supprimerUtilisateur(){
         $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        if(!isset($_GET['mail'])){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/vueErreur.php');
            return;
        }
        $email = nettoyage::nettoyerChaine($_GET['mail']);

        
        try{

            return modelUtilisateur::supprimerUtilisateur($email);
            $vueConfirmation[] = "L'utilisateur à bien été suprimé.";
            require_once('vue/vueConfirmation.php');

        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            require_once('vue/erreur.php');
        }
    }

    public function vueAdminModifierUtilisateur(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        if(!isset($_GET['mail'])){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/vueErreur.php');
            return;
        }
        $email = nettoyage::nettoyerChaine($_GET['mail']);

        
        try{

            $utilisateur = modelUtilisateur::rechercheUtilisateur($email);
            $_SESSION['utilisateurModifie'] = $utilisateur;
            require_once('vue/userEdit.php');

        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            require_once('vue/erreur.php');
        }
    }

    public function adminModifierUtilisateur(){
        
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'aviez pas à avoir accés à cette partie du site";
            require_once('vue/login.php');
            return;
        }

        $utilisateur= $_SESSION['utilisateurModifie'];

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

        $id_niveau_utilisateur=$utilisateur->id_groupe;
        
        $avatar = NULL;

        $utilisateur = modelUtilisateur::modifierUtilisateur($utilisateur->userId, $prenom, $nom, $email, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar);
        
        $vueConfirmation[] = "Les modifications ont bien été réalisé.";
        require_once('vue/userEdit.php');
    }

    public function afficherToutUtilisateur(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $listeUsers = modelUtilisateur::afficherToutUtilisateur();
        require_once('vue/listeUtilisateurs.php');
    }

     public static function verifierDroit(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try{
            if(isset($_SESSION['utilisateurConnecter']->id_groupe)) echo "string";
            $libelle = modelNiveau::rechercherLibelle($_SESSION['utilisateurConnecter']->id_groupe);
            if( $libelle == 'administrateur'){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $ex){
            $vueErreur[]="erreur PDOException ressus.";
            require_once('vue/vueErreur.php');
        }
    }


}