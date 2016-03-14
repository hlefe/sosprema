 <?php 
/* Formulaire adresse
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

<div class="box-header with-border">
    <h3 class="box-title">Adresse</h3>
    <?php if($_REQUEST['action'] != "afficherHopital") { ?>
    <div class="box-tools pull-right">
        <span class="label label-primary">Facultatif</span>
    </div>
    <?php } ?>
</div>
<div class="box-body">
    <!-- Adresse dynamique -->
    <?php include('vue/includes/hopital/adresse/maps-address_field.php'); ?>    
</div>