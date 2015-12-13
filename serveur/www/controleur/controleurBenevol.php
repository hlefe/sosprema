<?php

/**
 * 
 */
class controleurBenevol {

    public function __construct()
    {
        try {
            $vueErreur = array();
            $action = $_REQUEST['action'];
                
            switch ($action) {
                
                case NULL :
                    $vueErreur[] = "Probleme pas d'action";
                    break;
                
                case "connexion":
                    try {
                        if($this->validationFormulaireConnexion()){
                            header('Location:index.php?vueAppeller=accueil');
                        }else
                            header('Location:index.php');
                    }catch(PDOException $ex){
                        echo $ex;
                    }                 
                    break;

                case "deconnexion":
                    $this->detruireSession();
                    header('Location:index.php');             
                    break;

                case "modifierUtilisateur":
                    try {
                        $this->modifierUtilisateur();
                        header('Location:index.php?vueAppeller=profil');
                    } catch(PDOException $ex){
                        $vueErreur[] = "Erreur base de donnée, PDOException";
                        header('Location:index.php?vueAppeller=erreur');
                    }
                    break;

                case "modifierMotDePasse":
                    try {
                        $this->modifierMotDePasse();
                        $vueConfirmation[] = "votre mot de passe à bien été modifié.";
                        header('Location:index.php?vueAppeller=confirmation&message='.$vueConfirmation[].'');
                    } catch(PDOException $ex){
                        $vueErreur[] = "Erreur base de donnée, PDOException";
                        header('Location:index.php?vueAppeller=erreur');
                    }
                    break;

                default :
                    $vueErreur[] = "Probleme authentification";
                    header('Location:index.php?vueAppeller=erreur');
            }
        } catch(PDOException $ex){
            $vueErreur[] = "Erreur base de donnée, PDOException";
            header('Location:index.php?vueAppeller=erreur');
        } catch (Exception $ex) {
            $vueErreur[] = "Erreur inattendue";
            header('Location:index.php?vueAppeller=erreur');
        }
    }

    public function validationFormulaireConnexion() {
                
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

    public function modifierUtilisateur() {
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

        $id_niveau_utilisateur=$_SESSION['utilisateurConnecter']->id_groupe;
        $avatar = NULL;

        $_SESSION['utilisateurConnecter'] = modelUtilisateur::modifierUtilisateur($_SESSION['utilisateurConnecter']->userId, $prenom, $nom, $email, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar);

    }

    public function modifierMotDePasse(){

        if(isset($_POST['oldMDP'])){
            $oldMDP = nettoyage::nettoyerChaine($_POST['oldMDP']);
            if($_SESSION['utilisateurConnecter']->verifierMotDePasse($oldMDP)){

                if(isset($_POST['newMDP'])){
                    $newMDP = nettoyage::nettoyerChaine($_POST['newMDP']);
                    if (isset($_POST['newMDPVerif'])){
                        $newMDPVerif = nettoyage::nettoyerChaine($_POST['newMDPVerif']);
                        if($newMDP==$newMDPVerif){
                            $mot_de_passe=nettoyage::nettoyerChaine($_POST['newMDP']);

                            if(validation::validerPassword($mot_de_passe)){
                                modelUtilisateur::modifierMotDePasse($_SESSION['utilisateurConnecter']->userId, $mot_de_passe);
                            }else{
                                echo "mot de passe invalide.";
                            }
                        }else{
                            echo "le mot de passe de vérification ne correspond pas au mot de passe.";
                        }
                    }else{
                        echo "veuiller renseigner le champ de vérification du nouveau mot de passe.";
                    }
                }else{
                    echo "veuiller renseigner le champ pour le nouveau mot de passe.";
                }
            } else{
                echo "l'ancien mot de passe est invalide.";
            }
        }else{
            echo "veuiller renseigner votre ancien mot de passe";
        }
    }

    public function detruireSession(){
        session_destroy();
    }

    public static function verifierDroit(){
        if(modelNiveau::rechercherLibelle($_SESSION['utilisateurConnecter']->id_groupe) == NULL){
            return true;
        }else{
            return true;
        }
    }
}
