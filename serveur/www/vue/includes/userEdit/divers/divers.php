 <?php 
/* Champs divers

Si l'on est dans le cas de l'édition de l'utilisateur:
    La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
    pour pouvoir compléter les données déjà enregistrées.
    
Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.

Les champs suivants sont définis:

        profession      Profession de l'utilisateur
        divers          Un champs divers à propos de l'utilisateur
        avatar          Avatar de l'utilisateur définnit grâce au fichier 'avatar_upload.php'
        
 */
?> 
<div class="box-header with-border">
    <h3 class="box-title">Divers</h3>
    <div class="box-tools pull-right">
        <span class="label label-primary">Facultatif</span>
    </div>
</div>

<div class="box-body">
    <div class="row">
    <div class="col-sm-8">
        <div class=" form-group">
            <label for="prenom">Profession</label>
            <input class="form-control" type="text" name="profession" value="<?php if(isset($utilisateur)) echo $utilisateur->profession;?>" />
        </div>
        <div class="form-group">   
            <label for="email">Divers</label>
            <input class="form-control" type="text" name="divers" value="<?php if(isset($utilisateur)) echo $utilisateur->divers;?>" />
        </div>
    </div>
    <div class="col-sm-3 form-group">
        <label for="nom">Avatar</label>
        <?php require('vue/includes/userEdit/divers/avatar_upload.php'); ?>
    </div>
    </div>
</div>
