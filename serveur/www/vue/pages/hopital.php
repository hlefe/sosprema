<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
          <!-- Main row -->
    <div class="row">
        <!-- Colonne de gauche -->
        <section class="col-lg-7 connectedSortable">
            
            <div class="box box-danger">
                <!-- Champs informations -->
                <?php include('vue/includes/hopital/informations/informations.php'); ?>
            </div>
            
            <div class="box box-primary">
                <!-- Champs divers -->
                <?php include('vue/includes/hopital/divers/divers.php'); ?>
            </div>
        </section>
        
            <!-- Colonne de droite-->
        <section class="col-lg-5 connectedSortable">
        
            <div class="box">
                <!-- Champs adresse -->
                <?php include('vue/includes/hopital/adresse/adresse.php'); ?>
            </div>
        </section>
    </div>
</section>
<?php require('vue/layout/footer.php'); ?>
