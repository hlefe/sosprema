 <?php 
/* Champs intéractif de saisie d'une adresse avec l'utilisation de l'autocompletion google maps
 
Ce formulaire renvoie les champs suivants:

        numRue          Numéro de la rue
        nomRue          Nom de la rue
        codePostal      Code postal de la rue
        nomVille        Nom de la ville
        
 */
?> 
 
<!-- //Appel du plugin permettant l'autocomplétion google maps (Modifier ce fichier pour configurer l'API key google maps) -->
<?php require('vue/style/plugins/google-place-autocomplete-gh-pages/config.php');  ?> 

<!-- Boite de dialogue pour la recherche  -->
<div class="alert alert-info alert-dismissible">
    <h4><i class="icon fa fa-info"></i>Adresse complète</h4>
    <div class="form-group">
       <!-- Champ de recherche  -->
       <input class="form-control" id="user_input_autocomplete_address" placeholder="Taper l'adresse ici...">    
    </div>  
</div>

<!-- Résultats de la recherche sous forme de champs grisés   -->
<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Adresse détaillée</h3>
        <div class="box-tools pull-right">
            <a href="index.php?action=<?php echo $_REQUEST['action']; ?>&editAddress=true<?php if (isset($_REQUEST['mail'])) { ?>&mail=<?php echo $_REQUEST['mail']; } ?>">Modifier</a>
        </div>
    </div>
    
    <div class="box-body">
        <!-- Noms des champs -->
        <div class="col-xs-4">
            <p>
                <label for="numRue">Numéro de rue</label>                     
            </p><p>
                <label for="nomRue">Nom de rue</label>
            </p><p>
                <label for="codePostal">Code postal</label>
            </p><p> 
                <label for="ville">Ville</label>
            </p>
        </div>
        <!-- Contenu grisé des champs -->
        <div class="col-xs-8">
            <input id="street_number" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="numRue" value="<?php if($pageActuelle->id =='profil')  echo $utilisateurConnecter->numRue; if($pageActuelle->id =='vueAdminModifierUtilisateur'|| 'adminModifierUtilisateur')  echo $utilisateur->numRue;?>" />
            <input id="route" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="nomRue" value="<?php if($pageActuelle->id =='profil')  echo $utilisateurConnecter->nomRue; if($pageActuelle->id =='vueAdminModifierUtilisateur'|| 'adminModifierUtilisateur')  echo $utilisateur->nomRue;?>" />
            <input id="postal_code" class="form-control" type="text" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> name="codePostal" value="<?php if($pageActuelle->id =='profil')  echo $utilisateurConnecter->codePostal; if($pageActuelle->id =='vueAdminModifierUtilisateur'|| 'adminModifierUtilisateur')  echo $utilisateur->codePostal;?>" />
            <input id="locality" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="nomVille" value="<?php if($pageActuelle->id =='profil')  echo $utilisateurConnecter->nomVille; if($pageActuelle->id =='vueAdminModifierUtilisateur'|| 'adminModifierUtilisateur')  echo $utilisateur->nomVille;?>" />
      </div> 
   </div>
   <!-- /.box-body -->
</div>