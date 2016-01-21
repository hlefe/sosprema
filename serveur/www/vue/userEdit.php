<?php require_once('header.php'); 
require_once('erreur.php');
require_once('confirmation.php'); ?>
<form method="post" action="index.php?action=adminModifierUtilisateur">
    <div class="contenuteSansFond ">
        <div class="colonneGauche wtitre">
            <h2> Modifier un utilisateur </h2>
        </div>
        <div class="colonneDroite wtitre">
            <div class="green">
                <button id="boutonAjouter" class="submit" name="boutonAjouter" type="hidden" value="ajouterUtilisateur"><span class="entypo-check">&nbsp;Enregistrer</span></button>

            </div>
            <div class="green mdp">
                <a href="index.php?action=vueModifierMotDePasse" ><span>Modifier mot de passe</span></a>
            </div>
        </div>
    </div>
  
    <div class="colonneGauche infosAccueil">
        <div id="contenute" class="Caccueil">
                <h3>Informations</h3>
                    <label for="nom">Nom</label>
                    <input required type="text" name="nom" value="<?php echo $utilisateur->nom;?>" />
                    
                    <label for="prenom">Prénom</label>
                    <input required type="text" name="prenom" value="<?php echo $utilisateur->prenom;?>" />
                    
                    <label for="email">Adresse Mail</label>
                    <input required type="text" name="email" value="<?php echo $utilisateur->email;?>" />
        </div>  
    </div> 

    <div class="colonneGauche infosAccueil">
        <div id="contenute" class="Caccueil">
                <h3>Divers</h3>
                    <label for="nom">Avatar</label>
                    <img src="<?php echo $utilisateurConnecter->avatar; ?>">
                    <input  type="text" name="avatar" value="<?php echo $utilisateurConnecter->avatar;?>" />
                    
                    <label for="prenom">Profession</label>
                    <input  type="text" name="profession" value="<?php echo $utilisateurConnecter->profession;?>" />
                    
                    <label for="email">Divers</label>
                    <input type="text" name="divers" value="<?php echo $utilisateurConnecter->divers;?>" />
        </div>  
    </div> 

    <div class="colonneDroite infosAccueil">
        <div id="contenute" class="Caccueil">
            <h3>Adresse</h3>
    
            <label for="num_rue">Numéro de rue</label>
            <input type="text" name="num_rue" value="<?php echo $utilisateur->numRue;?>" />
            
            <label for="nom_rue">Nom de rue</label>
            <input type="text" name="nom_rue" value="<?php echo $utilisateur->nomRue;?>" />
            
            <label for="code_postal">Code postal</label>
            <input type="text" name="code_postal" value="<?php echo $utilisateur->codePostal;?>" />

            <label for="ville">Ville</label>
            <input type="text" name="nomVille" value="<?php echo $utilisateur->nomVille;?>" />

             <label for="ville">Département</label>
            <input type="text" name="nomDepartement" value="<?php echo $utilisateurConnecter->nomRegion;?>" />

            <label for="ville">Région</label>
            <input type="text" name="nomRegion" value="<?php echo $utilisateurConnecter->nomRegion;?>" />
        </div>
    </div>
</form>
<?php require_once('footer.php'); ?>
