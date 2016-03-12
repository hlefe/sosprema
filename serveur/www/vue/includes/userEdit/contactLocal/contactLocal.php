 <?php 
/* Champs informations

Si l'on est dans le cas de l'édition de l'utilisateur:
    La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
    pour pouvoir compléter les données déjà enregistrées.
    
Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.

Les champs suivants sont définis:

        nom             Nom de l'utilisateur
        prenom          Prénom de l'utilisateur
        email           Adresse email de l'utilisateur
        
 */
?> 
<div class="box-header with-border">
    <h3 class="box-title">Fiche contact local</h3>
    <div class="box-tools pull-right">
        <span class="label label-primary">Requis</span>
    </div>
</div>
<div class="box-body">
     <?php 
    $test = $utilisateur->contactLocal;
    if (isset($test)){ ?>

    <div class="form-group">
        <label for="datePremierEngagement">Date première engagement</label>
        <input class="form-control" required type="text" name="datePremierEngagement" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->datePremierEngagement; ?>"/>
    </div>
    <div class="form-group">
            <label for="dateRenouvellement">Date de renouvellement</label>
            <input class="form-control" required type="text" name="dateRenouvellement" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->dateRenouvellement;?>" />
    </div>
    <div class="form-group">
            <label for="dateSenior">Date senior</label>
            <input class="form-control" required type="text" name="dateSenior" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->dateSenior;?>" />
    </div>
    <div class="form-group">
            <label for="visitesBenevoles">Visite Benevoles</label>
            <input class="form-control" required type="text" name="visitesBenevoles" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->visitesBenevoles;?>" />
    </div>
    <div class="form-group">
            <label for="dateSenior">Convention Hopital</label>
            <input class="form-control" required type="text" name="conventionHopital" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionHopital;?>" />
    </div>
    <div class="form-group">
            <label for="conventionCAMSP">Convention CAMSP</label>
            <input class="form-control" required type="text" name="conventionCAMSP" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionCAMSP;?>" />
    </div>
    <div class="form-group">
            <label for="conventionCAMSP">Convention CAMSP</label>
            <input class="form-control" required type="text" name="conventionCAMSP" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionCAMSP;?>" />
    </div>
    <div class="form-group">
            <label for="conventionPMI">Convention PMI</label>
            <input class="form-control" required type="text" name="conventionPMI" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionPMI;?>" />
    </div>
    <div class="form-group">
            <label for="charteVisiteur">Charte visiteur</label>
            <input class="form-control" required type="text" name="charteVisiteur" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->charteVisiteur;?>" />
    </div>
    <?php }else{ ?>
        <a href="index.php?action=userEdit&mailC=<?php echo $utilisateur->email ?>" class="btn bg-purple">Faire de cet utilisateur un contact local</a>
    <?php } ?>

</div>
<?php 
    $test = $utilisateur->contactLocal;
    if (isset($test)){ ?>
<div class="box-footer">
    <!-- bouton enregistrer -->
    <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
</div>
<?php } ?>