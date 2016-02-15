<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
    <form method="post" action="index.php?action=ajouterHopital&add=true">
        <!-- Main row -->
            <div class="row">
                <!-- Colonne de gauche -->
                <section class="col-lg-7 connectedSortable">
                    <div class="box box-danger">
                        <!-- Champs informations -->
                        <?php include('vue/includes/hopital/informations/informations.php'); ?>
                    </div>
                    
                </section><!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                    
                    <div class="box">
                         <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="boutonAjouter" value="ajouterUtilisateur">Ajouter</button>
                         </div>
                    </div>
                    
                    <div class="box box-primary">
                        <!-- Champs divers -->
                        <?php include('vue/includes/hopital/divers/divers.php'); ?>
                    </div>
                    <div class="box">
                         <!-- Champs adresse -->
                        <?php include('vue/includes/hopital/adresse/adresse.php'); ?>
                    </div>
                </section>
            </div><!-- /.row (main row) -->
     </form>
</section>
<?php require_once('vue/layout/footer.php'); ?>