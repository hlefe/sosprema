 <?php 
/* Formulaire adresse

Si l'on est dans le cas de l'édition de l'utilisateur:
    La variable '$utilisateur' de type 'Utilisateur' doit être préalablement définie,
    pour pouvoir compléter les données déjà enregistrées.
    
Si on est dans le cas de l'ajout d'un utilisateur, rien à faire.

Les champs suivants sont définis:

        numRue          Numéro de la rue
        nomRue          Nom de la rue
        codePostal      Code postal de la rue
        nomVille        Nom de la ville
        
 */
?> 

<div class="box-header with-border">
    <h3 class="box-title">Adresse</h3>
    <div class="box-tools pull-right">
        <span class="label label-primary">Facultatif</span>
    </div>
</div>
<div class="box-body">
    <!-- Adresse dynamique -->
    <?php include('vue/includes/userEdit/adresse/maps-address_field.php'); ?>    
</div>