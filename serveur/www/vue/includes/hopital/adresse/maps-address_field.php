 <?php 
/* Champs intéractif de saisie d'une adresse avec l'utilisation de l'autocompletion google maps
*
* La source du plugin se trouve dans le répertoire vue/style/plugins/google-place-autocomplete-gh-pages/
*
* Pour modifier l'API KEY GOOGLE MAPS: 
* -Aller dans ce fichier:
* vue/style/plugins/google-place-autocomplete-gh-pages/config.php
*
* Si l'on est dans le cas de l'édition/consultation de l'hopital:
*    La variable '$hopital' doit être préalablement définie,
*    pour pouvoir compléter les données déjà enregistrées.
*    
* Si on est dans le cas de l'ajout d'un hopital, rien à faire.
*
* Les champs suivants sont définis:
*
*        numRue          Numéro de la rue
*        nomRue          Nom de la rue
*        codePostal      Code postal de la rue
*        nomVille        Nom de la ville
*        nomDepartement  Nom du département
*        nomRegion       Nom de la région
*        
*/
?> 
 
<!-- //Appel du plugin permettant l'autocomplétion google maps (Modifier ce fichier pour configurer l'API key google maps) -->
<?php require('vue/style/plugins/google-place-autocomplete-gh-pages/config.php');  ?> 

<?php if($_REQUEST['action'] != "afficherHopital") { ?>
<!-- Boite de dialogue pour la recherche  -->
<div class="alert alert-info alert-dismissible">
    <h4><i class="icon fa fa-info"></i>Adresse complète</h4>
   
    <div class="form-group">
       <!-- Champ de recherche  -->
       <input class="form-control" id="user_input_autocomplete_address" placeholder="Taper l'adresse ici..."  >    
    </div>  
</div>
<?php } ?>

<!-- Résultats de la recherche sous forme de champs grisés   -->
<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Adresse détaillée</h3>
        <?php if($_REQUEST['action'] !="afficherHopital") {?>
        <div class="box-tools pull-right">
            <a href="index.php?action=<?php echo $_REQUEST['action']; ?>&editAddress=true<?php if (isset($_REQUEST['id'])) { ?>&mail=<?php echo $_REQUEST['id']; } ?>">Modifier</a>
        </div>
        <?php } ?>
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
            </p><p> 
                <label for="departement">Département</label>
            </p><p> 
                <label for="region">Région</label>
            </p>
        </div>
        <!-- Contenu grisé des champs -->
         <div class="col-xs-8">

            <input id="street_number" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="numRue" value="<?php if(isset($hopital)) echo $hopital->adresse->numRue; ?>" />
            <input id="route" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="nomRue" value="<?php if(isset($hopital)) echo $hopital->adresse->nomRue; ?>" />
            <input id="postal_code" class="form-control" type="text" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> name="codePostal" value="<?php if(isset($hopital)) echo $hopital->adresse->codePostal;?>" />
            <input id="locality" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="nomVille" value="<?php if(isset($hopital)) echo $hopital->adresse->nomVille;?>" />
            <input id="locality" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="nomDepartement" value="<?php if(isset($hopital)) echo $hopital->adresse->nomDepartement;?>"/>
            <input id="locality" class="form-control" <?php if(!isset($_REQUEST['editAddress'])) echo "readonly";  ?> type="text" name="nomRegion" value="<?php if(isset($hopital)) echo $hopital->adresse->nomRegion;?>"/>

        </div> 
   </div>
</div>