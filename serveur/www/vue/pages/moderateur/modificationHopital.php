<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
    <form method="post" action="index.php?action=modifierHopital" enctype="multipart/form-data">
        <!-- Main row -->
        <div class="row">
            <!-- Colonne de gauche -->
            <section class="col-lg-7 connectedSortable">
                
                <div class="box box-danger">
                    <!-- Champs informations -->
                    <?php include('vue/includes/hopital/informations/informations.php'); ?>
                    <div class="box-footer">
                            <!-- bouton enregistrer -->
                            <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                    </div>
                </div>
                
                <div class="box box-primary">
                    <!-- Champs divers -->
                    <?php include('vue/includes/hopital/divers/divers.php'); ?>
                    <div class="box-footer">
                            <!-- bouton enregistrer -->
                            <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                    </div>
                </div>
            </section>
            
                <!-- Colonne de droite-->
            <section class="col-lg-5 connectedSortable">
                <div class="box">
                    <!-- Champs adresse -->
                    <?php include('vue/includes/hopital/contacts/contacts.php'); ?>
                    <div class="box-footer">
                            <!-- bouton enregistrer -->
                            <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                    </div>
                </div>
                
                <div class="box">
                    <!-- Champs adresse -->
                    <?php include('vue/includes/hopital/adresse/adresse.php'); ?>
                    <div class="box-footer">
                            <!-- bouton enregistrer -->
                            <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                    </div>
                </div>
            </section>
        </div>
     </form>
</section>
<?php require('vue/layout/footer.php'); ?>
