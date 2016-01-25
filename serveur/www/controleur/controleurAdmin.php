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

    // permet à l'administrateur d'ajouter un utilisateur.
    public function ajouterUtilisateur() {
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        try{
            $nom = variableExterne::verifChampObligatoire('nom','nom');
            $prenom =variableExterne::verifChampObligatoire('prenom','prenom');
            $motDePasse = variableExterne::verifChampObligatoire('mot de passe','motDePasse');
            $email = variableExterne::verifChampEmail('email', null);
        }catch(Exception $e){
            $vueErreur[]=$e;
            require_once('vue/profil.php');
            return;
        }

            $numRue=variableExterne::verifChampOptionnel('numRue');
            $nomRue=variableExterne::verifChampOptionnel('nomRue');
            $codePostal=variableExterne::verifChampOptionnel('codePostal');
            $nomVille=variableExterne::verifChampOptionnel('nomVille');
            $nomRegion=variableExterne::verifChampOptionnel('nomRegion');
            $nomDepartement=variableExterne::verifChampOptionnel('nomDepartement');
            $dateDeNaissance=variableExterne::verifChampOptionnel('dateDeNaissance');
            $avatar=variableExterne::verifChampOptionnel('avatar');     
            $profession=variableExterne::verifChampOptionnel('profession');
            $divers=variableExterne::verifChampOptionnel('divers');

        if(isset($_POST['libelle_niveau']))
            $idNiveau=modelNiveau::rechercherId(nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau==false){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à se libelle";
                require_once('vue/ajoutUtilisateur.php');
                return;
            } else{
            $idNiveau=modelNiveau::rechercherId('utilisateur');
        }


        try{
            modelUtilisateur::creerUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar,$idNiveau,$idFamille=null,$nomVille,$nomDepartement,$nomRegion);
            
            $vueConfirmation[] = "L'utilisateur à bien été ajouté.";
            require_once('vue/ajoutUtilisateur.php');
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOxception";
            require_once('vue/ajoutUtilisateur.php');
        }

    }

    //permet la supression d'un utilisateur grace à son adresse email.
    public function supprimerUtilisateur(){
         $utilisateurConnecter = $_SESSION['utilisateurConnecter'];

        if(!isset($_GET['mail'])){
            $vueErreur[] = "Veuiller renseigner une adresse mail.";
            require_once('vue/vueErreur.php');
            return;
        }
        $email = nettoyage::nettoyerChaine($_GET['mail']);

        
        try{

            modelUtilisateur::supprimerUtilisateur($email);
            $vueConfirmation[] = "L'utilisateur à bien été suprimé.";
            $listeUsers = modelUtilisateur::afficherToutUtilisateur();
            require_once('vue/listeUtilisateurs.php');
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            $listeUsers = modelUtilisateur::afficherToutUtilisateur();
            require_once('vue/listeUtilisateurs.php');
        }
    }

    //fonction permettant l'apelle à la vue pour modifier un utilisateur.
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

    //fonction permettant à un aministrateur de modifier un utilisateur.
    public function adminModifierUtilisateur(){
        if(isset($_SESSION['utilisateurConnecter'])){
            $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        }else{
            $vueErreur[] = "vous n'avez pas à avoir accés à cette partie du site";
            require_once('vue/login.php');
            return;
        }

        $utilisateur=$_SESSION['utilisateurModifie'];

        try{
            $nom = variableExterne::verifChampObligatoire('nom','nom');
            $prenom =variableExterne::verifChampObligatoire('prenom','prenom');
            $email = variableExterne::verifChampEmail('email', $utilisateur->email);
        }catch(Exception $e){
            $vueErreur[]=$e;
            require_once('vue/userEdit.php');
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


        if(!isset($_POST['libelle_niveau'])){
            $idNiveau = $utilisateur->idNiveau;
        }else{
                $idNiveau=modelNiveau::rechercherId(nettoyage::nettoyerChaine($_POST['libelle_niveau']));
                
            if($idNiveau==false && isset($_POST['libelle_niveau'])){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à se libelle";
                require_once('vue/userEdit.php');
                return;
            }
        }     
        
        
        try{

            $_SESSION['utilisateurModifie'] = modelUtilisateur::modifierUtilisateur($utilisateur->userId,$email,$nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $code_postal,$profession,$divers,$avatar,$idNiveau,$idFamille=null,$nomVille,$nomDepartement,$nomRegion);
            $utilisateur = $_SESSION['utilisateurModifie'];
            
            $vueConfirmation[] = "L'utilisateur à bien été modifié.";
            require_once('vue/userEdit.php');
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            require_once('vue/userEdit.php');
        }
    }

    //fonction permettant la récupération de tout les utilisateurs dans la base.
    public function afficherToutUtilisateur(){
        $utilisateurConnecter = $_SESSION['utilisateurConnecter'];
        $listeUsers = modelUtilisateur::afficherToutUtilisateur();
        require_once('vue/listeUtilisateurs.php');
    }

    //fonction permettant de vérifier si un utilisateur est admin ou non.
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