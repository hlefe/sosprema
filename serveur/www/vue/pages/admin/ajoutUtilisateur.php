<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
    <form method="post" action="index.php?action=ajoutUtilisateur&add=true">
        <!-- Main row -->
            <div class="row">
                <!-- Colonne de gauche -->
                <section class="col-lg-7 ">
                    <div class="box box-danger">
                        <!-- Champs informations -->
                        <?php include('vue/includes/userEdit/informations/informations.php'); ?>
                    </div>
                    
                    <div class="box box-danger">
                        <!-- Champs sécurité -->
                        <?php include('vue/includes/userEdit/security/security_create.php'); ?>
                    </div>
                    
                </section><!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets )-->
                <section class="col-lg-5 ">
                    
                    <div class="box">
                         <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="boutonAjouter" value="ajouterUtilisateur">Ajouter</button>
                         </div>
                    </div>
                    
                    <div class="box box-primary">
                        <!-- Champs divers -->
                        <?php include('vue/includes/userEdit/divers/divers.php'); ?>
                    </div>
                    <div class="box">
                         <!-- Champs adresse -->
                        <?php include('vue/includes/userEdit/adresse/adresse.php'); ?>
                    </div>
                </section>
            </div><!-- /.row (main row) -->
     </form>
</section>
<?php require_once('vue/layout/footer.php'); ?>