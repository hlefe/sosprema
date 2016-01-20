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

        if(!isset($_POST['motDePasse'])|| $_POST['motDePasse']==""){
            $vueErreur[] = "Veuiller renseigner un motDePasse.";
            require_once('vue/ajoutUtilisateur.php');
            return;
        }
        else
            $motDePasse = nettoyage::nettoyerChaine($_POST['motDePasse']);

        
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
        if(!isset($_POST['emailPerso'])|| $_POST['emailPerso']==""){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/ajoutUtilisateur.php');
            return;
        }
        else
            if(validation::validerEmail($_POST['emailPerso'])){
                $emailPerso = nettoyage::nettoyerChaine($_POST['emailPerso']);
                if(modelUtilisateur::verifierEmailNonPresent($emailPerso)){
                    $vueErreur[] = "Un utilisateur existe déjà avec l'adresse emailPerso correspondante.";
                    require_once('vue/ajoutUtilisateur.php');
                    return;
                }
            }else{
                $vueErreur[] = "Veuiller renseigner une adresse mail valide.";
                require_once('vue/ajoutUtilisateur.php');
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
                require_once('vue/ajoutUtilisateur.php');
                return;
            }
        else{
            $idNiveau=modelNiveau::rechercherId('utilisateur');
        }


        try{
            modelUtilisateur::creerUtilisateur($email, $emailPerso,$nom,$prenom,$motDePasse,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar,$idNiveau,$idFamille=null,$nomVille,$nomDepartement,$nomRegion);
            
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

        if(!isset($_POST['nom']) || $_POST['nom']==""){
            $vueErreur[] = "Veuiller renseigner un nom.";
            require_once('vue/userEdit.php');
            return;
        }
        else
            $nom = nettoyage::nettoyerChaine($_POST['nom']);

        if(!isset($_POST['prenom'])|| $_POST['prenom']==""){
            $vueErreur[] = "Veuiller renseigner un prenom.";
            require_once('vue/userEdit.php');
            return;
        }
        else
            $prenom = nettoyage::nettoyerChaine($_POST['prenom']);
 
        if(!isset($_POST['email'])|| $_POST['email']==""){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/userEdit.php');
            return;
        }
        else
            if(validation::validerEmail($_POST['email'])){
                $email = nettoyage::nettoyerChaine($_POST['email']);
                if($email != $utilisateur->email){
                    if(modelUtilisateur::verifierEmailNonPresent($email)){
                        $vueErreur[] = "Un utilisateur existe déjà avec l'adresse email correspondante.";
                        require_once('vue/userEdit.php');
                        return;
                    }
                }
            }else{
                $vueErreur[] = "Veuiller renseigner une adresse mail valide.";
                require_once('vue/userEdit.php');
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
                require_once('vue/userEdit.php');
                return;
            }
        else{
            $idNiveau=modelNiveau::rechercherId('utilisateur');
        }


        try{
            modelUtilisateur::modifierUtilisateur($email,$nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $code_postal,$profession,$divers,$avatar,$idNiveau,$idFamille=null,$nomVille,$nomDepartement,$nomRegion);
            
            $vueConfirmation[] = "L'utilisateur à bien été ajouté.";
            require_once('vue/userEdit.php');
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            require_once('vue/userEdit.php');
        }
    }

    public function afficherToutUtilisateur(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $listeUsers = modelUtilisateur::afficherToutUtilisateur();
        require_once('vue/listeUtilisateurs.php');
    }

     public static function verifierDroit(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        try{
            if(isset($_SESSION['utilisateurConnecter']->idNiveau)) echo "string";
            $libelle = modelNiveau::rechercherNom($_SESSION['utilisateurConnecter']->idNiveau);
            if( $libelle == 'administrateur'){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $ex){
            $vueErreur[]=$ex;
            require_once('vue/vueErreur.php');
        }
    }


}