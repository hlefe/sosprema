 <?php 
/* Champs informations
*
* Si l'on est dans le cas de l'édition de l'utilisateur:
*    La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
*    pour pouvoir compléter les données déjà enregistrées.
*    
* Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.
*
* Les champs suivants sont définis:
*
*        nom             Nom de l'utilisateur
*        prenom          Prénom de l'utilisateur
*        email           Adresse email de l'utilisateur
*        
*/
?> 
<div class="box-header with-border">
    <h3 class="box-title">Informations</h3>
    <?php if($_REQUEST['action'] != "afficherHopital") { ?>
    <div class="box-tools pull-right">
        <span class="label label-primary">Requis</span>
    </div>
    <?php } ?>
</div>
<div class="box-body">
    <div class="form-group">
        <label for="nomHopital">Nom de l'hopital</label>
        <input class="form-control" type="text" name="nomHopital" value="<?php if(isset($hopital)) echo $hopital->nomHopital; ?>" <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>/>
    </div>
    <div class="form-group">
            <label for="service">Service</label>
            <select class="form-control" name="service" <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>>
                        <option value="1" <?php if(isset($hopital)) {if ($hopital->service == 1){ echo "selected"; } } ?> <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>>
                            Maternité simple (Niveau 1)
                        </option>
                        <option value="2"<?php if(isset($hopital)) {if ($hopital->service == 2){ echo "selected"; } } ?> <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>>
                            Réanimation (Niveau 2)
                        </option>
                        <option value="3"<?php if(isset($hopital)) {if ($hopital->service == 3){ echo "selected"; } } ?> <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly"; ?>>
                            Néonatologie (Niveau 3)
                        </option>
            </select>
    </div>
    <div class="form-group" style="height:30px">
            <label for="conventionmail">Convention</label>
            <input data-off-text="Non"  data-on-text="Oui" type="checkbox" class="form-control" name="convention" <?php if(isset($hopital)&&$hopital->convention=="on") echo "checked";?> <?php if($_REQUEST['action'] == "afficherHopital") echo "readonly";?> />
    </div>
</div>