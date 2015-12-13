<?php

/**
 * 
 */
class controleurAdmin {

    public function __construct()
    {
        try {
            $vueErreur = array();
            $action = $_REQUEST['action'];
                
            switch ($action) {
                
                case NULL :
                    $vueErreur[] = "Probleme pas d'action";
                    break;

                case "ajouterUtilisateur":
                    try {
                        $this->ajouterUtilisateur();
                        $vueConfirmation[] = "L'utilisateur à bien été ajouté.";
                        foreach ($vueConfirmation as $key => $value) {
                            $message .= "&message[]=".$value."";
                        }
                        header('Location:index.php?vueAppeller=confirmation'.$message.'');
                    } catch(PDOException $ex){
                        $vueErreur[] = "Erreur base de donnée, PDOException";
                        foreach ($vueErreur as $key => $value) {
                            $message .= "&erreur[]=".$value."";
                        }
                        header('Location:index.php?vueAppeller=erreur'.$message.'');
                    }
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

    public function ajouterUtilisateur() {
        if(!isset($_POST['nom'])|| $_POST['nom']==""){
            echo "veuiller renseigner un nom";
            header('Location:index.php?vueAppeller=ajoutUtilisateur');
        }
        else
            $nom = nettoyage::nettoyerChaine($_POST['nom']);

        if(!isset($_POST['prenom'])|| $_POST['prenom']==""){
            echo "veuiller renseigner un prenom";
            header('Location:index.php?vueAppeller=ajoutUtilisateur');
        }
        else
            $prenom = nettoyage::nettoyerChaine($_POST['prenom']);
        
        if(!isset($_POST['email'])|| $_POST['email']==""){
            echo "veuiller renseigner une adresse mail";
            header('Location:index.php?vueAppeller=ajoutUtilisateur');
        }
        else
            if(validation::validerEmail($_POST['email']))
                $email = nettoyage::nettoyerChaine($_POST['email']);
            else{
                echo "veuiller renseigner une adresse mail valide";
                header('Location:index.php?vueAppeller=ajoutUtilisateur');
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

        if(isset($_POST['id_niveau_utilisateur']))
            $id_niveau_utilisateur=nettoyage::nettoyerChaine($_POST['id_niveau_utilisateur']);
        else
            $id_niveau_utilisateur=NULL;

        $avatar = NULL;

        $mot_de_passe = 'SosPrema';

        return modelUtilisateur::creerUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar);

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

     public static function verifierDroit(){
        try{
            if(isset($_SESSION['utilisateurConnecter']->id_groupe)) echo "string";
            $libelle = modelNiveau::rechercherLibelle($_SESSION['utilisateurConnecter']->id_groupe);
            if( $libelle == 'administrateur'){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $ex){
            echo $ex;
        }
    }


}