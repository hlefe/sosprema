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
    <h3 class="box-title">Informations</h3>
    <div class="box-tools pull-right">
        <span class="label label-primary">Requis</span>
    </div>
</div>
<div class="box-body">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input class="form-control" required type="text" name="nom" value="<?php if(isset($utilisateur)) echo $utilisateur->nom; ?>" />
    </div>
    <div class="form-group">
            <label for="prenom">Prénom</label>
            <input class="form-control" required type="text" name="prenom" value="<?php if(isset($utilisateur)) echo $utilisateur->prenom;?>" />
    </div>
    <div class="form-group">
            <label for="email">Adresse Mail</label>
            <input class="form-control" required type="email" name="email" value="<?php if(isset($utilisateur)) echo $utilisateur->email;?>" />
    </div>
</div>