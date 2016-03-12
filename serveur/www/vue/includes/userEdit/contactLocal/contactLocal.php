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
        <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control date"  name="datePremierEngagement" value="<?php if(isset($utilisateur)) if($utilisateur->contactLocal->datePremierEngagement != "0000-00-00"){echo $utilisateur->contactLocal->datePremierEngagement;} ?>"/>
        </div>
            
    </div>

    <div class="form-group">
            <label for="dateRenouvellement">Date de renouvellement</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control date" " name="dateRenouvellement" value="<?php if(isset($utilisateur)) if($utilisateur->contactLocal->dateRenouvellement != "0000-00-00"){echo $utilisateur->contactLocal->dateRenouvellement;} ?>"/>
            </div>
    </div>
    <div class="form-group">
            <label for="dateSenior">Date senior</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control date"  name="dateSenior" value="<?php if(isset($utilisateur)) if($utilisateur->contactLocal->dateSenior != "0000-00-00"){echo $utilisateur->contactLocal->dateSenior;} ?>"/>
            </div>
    </div>
    <div class="form-group" style="height:30px">
            <label for="visitesBenevoles">Visite Benevoles</label>
            <input class="form-control" data-off-text="Non" data-on-text="Oui" type="checkbox" name="visitesBenevoles" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->visitesBenevoles;?>" />
    </div>
    <div class="form-group" style="height:30px">
            <label for="dateSenior">Convention Hopital</label>
            <input data-off-text="Non" data-on-text="Oui" type="checkbox"  class="form-control" name="conventionHopital" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionHopital;?>" />
    </div>
    <div class="form-group" style="height:30px">
            <label for="conventionCAMSP">Convention CAMSP</label>
            <input class="form-control" data-off-text="Non" data-on-text="Oui" type="checkbox"  name="conventionCAMSP" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionCAMSP;?>" />
    </div>
    <div class="form-group" style="height:30px">
            <label for="conventionCAMSP">Convention CAMSP</label>
            <input class="form-control" data-off-text="Non" data-on-text="Oui" type="checkbox"  name="conventionCAMSP" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionCAMSP;?>" />
    </div>
    <div class="form-group" style="height:30px">
            <label for="conventionPMI">Convention PMI</label>
            <input class="form-control" data-off-text="Non" data-on-text="Oui" type="checkbox"  name="conventionPMI" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->conventionPMI;?>" />
    </div>
    <div class="form-group" style="height:30px">
            <label for="charteVisiteur">Charte visiteur</label>
            <input class="form-control" data-off-text="Non" data-on-text="Oui" type="checkbox"  name="charteVisiteur" value="<?php if(isset($utilisateur)) echo $utilisateur->contactLocal->charteVisiteur;?>" />
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
    <?php 
    $test = $utilisateur->contactLocal;
    if (isset($test)){ ?>
    <a href="index.php?action=userEdit&mailCdelete=<?php echo $utilisateur->email ?>" class="btn bg-red pull-right"><i class="fa fa-fw fa-ban"></i> Cet utilisateur n'est plus un contact local</a>
    <?php } ?>
    <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
</div>
<?php } ?>