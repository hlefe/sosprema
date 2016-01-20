<?php require_once('header.php'); 
require_once('erreur.php');
require_once('confirmation.php'); ?>
  <form method="post" action="index.php?action=modifierUtilisateur">
     <div class="contenuteSansFond ">
        <div class="colonneGauche wtitre">
            <h2> Profil </h2>
        </div>
        <div class="colonneDroite wtitre">
            <div class="green">
                <button id="boutonAjouter" class="submit" name="boutonAjouter" type="hidden" value="ajouterUtilisateur"><span class="entypo-check">&nbsp;Enregistrer</span></button>

            </div>
        </div>
    </div>
    <div class="colonneGauche infosAccueil">
        <div id="contenute" class="Caccueil">
                <h3>Informations</h3>
                    <label for="nom">Nom</label>
                    <input required type="text" name="nom" value="<?php echo $utilisateurConnecter->nom;?>" />
                    
                    <label for="prenom">Prénom</label>
                    <input required type="text" name="prenom" value="<?php echo $utilisateurConnecter->prenom;?>" />
                    
                    <label for="email">Adresse Mail</label>
                    <input required type="text" name="email" value="<?php echo $utilisateurConnecter->email;?>" />
        </div>  
    </div> 

    <div class="colonneDroite infosAccueil">
        <div id="contenute" class="Caccueil">
            <h3>Adresse</h3>
    
            <label for="num_rue">Numéro de rue</label>
            <input type="text" name="num_rue" value="<?php echo $utilisateurConnecter->num_rue;?>" />
            
            <label for="nom_rue">Nom de rue</label>
            <input type="text" name="nom_rue" value="<?php echo $utilisateurConnecter->nom_rue;?>" />
            
            <label for="code_postal">Code postal</label>
            <input type="text" name="code_postal" value="<?php echo $utilisateurConnecter->code_postal;?>" />

            <label for="ville">Ville</label>
            <input type="text" name="ville" value="<?php echo $utilisateurConnecter->ville;?>" />
        </div>
    </div>
</form>
<?php require_once('footer.php'); ?>
