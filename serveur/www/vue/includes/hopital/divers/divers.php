 <?php 
/* Champs divers
*
* Si l'on est dans le cas de l'édition de l'utilisateur:
*    La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
*    pour pouvoir compléter les données déjà enregistrées.
*    
* Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.
*
* Les champs suivants sont définis:
*
*        profession      Profession de l'utilisateur
*        divers          Un champs divers à propos de l'utilisateur
*        avatar          Avatar de l'utilisateur définnit grâce au fichier 'avatar_upload.php'
*        
*/
?> 

<div class="box-header with-border">
    <h3 class="box-title">Divers</h3>
    <?php if($_REQUEST['action'] != "afficherHopital") { ?>
    <div class="box-tools pull-right">
        <span class="label label-primary">Facultatif</span>
    </div>
    <?php } ?>
</div>

<div class="box-body">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group" >
                <label for="prenom">Nombre de lits</label>
                <input class="form-control" type="text" name="nbLits" value="<?php if(isset($hopital)) echo $hopital->nbLits;?>" <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>/>
            </div>
            <div class="form-group">   
                <label for="email">Nombre d'enfants prématurés par an</label>
                <input class="form-control" type="text" name="nbPremaParAn" value="<?php if(isset($hopital)) echo $hopital->nbPremaParAn;?>" <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>/>
            </div>
            <div class="form-group" style="height:30px">   
                <label for="email">Café parents ?</label>
                <input data-off-text="Non" data-on-text="Oui" type="checkbox" class="form-control" name="cafeParent" <?php if(isset($hopital)&&$hopital->cafeParent=="on") echo "checked";?> <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>/>
            </div>
            <div class="form-group" style="height:30px">   
                <label for="email">Parking payant ?</label>
                <input data-off-text="Non" data-on-text="Oui" class="form-control" type="checkbox" name="parkingPayant" <?php if(isset($hopital)&&$hopital->parkingPayant=="on") echo "checked";?> <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>/>
            </div>
            <div class="form-group" style="height:30px">   
                <label for="email">Visite benevole</label>
                <input data-off-text="Non" data-on-text="Oui" type="checkbox" class="form-control" name="visiteBenevole" <?php if(isset($hopital)&&$hopital->visiteBenevole=="on") echo "checked";?> <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>/>
            </div>
        </div>
    </div>
</div>