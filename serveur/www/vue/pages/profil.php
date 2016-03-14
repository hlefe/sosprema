<?php 
/**
 * Vue profil
 *             
 * Permet d'afficher son profil
 *
 */
?>
<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
    <form method="post" action="index.php?action=profil&edit=true" enctype="multipart/form-data">
        <!-- Main row -->
        <div class="row">
            <!-- Colonne de gauche -->
            <section class="col-lg-7 ">
                
                <div class="box box-danger">
                    <!-- Champs informations -->
                    <?php include('vue/includes/userEdit/informations/informations.php'); ?>
                    <div class="box-footer">
                        <!-- bouton enregistrer -->
                        <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                        <!-- bouton modification mot de passe -->
                        <button type="submit" class="btn btn-warning" formaction="index.php?action=userPassword">Modifier mot de passe</button>
                    </div>
                </div>
                
                <div class="box box-primary">
                    <!-- Champs divers -->
                    <?php include('vue/includes/userEdit/divers/divers.php'); ?>
                    <div class="box-footer">
                        <!-- bouton enregistrer -->
                        <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                    </div>
                </div>
            </section>
            
            
            <!-- Colonne de droite-->
            <section class="col-lg-5 ">
                
                <div class="box">
                    <!-- Champs adresse -->
                    <?php include('vue/includes/userEdit/adresse/adresse.php'); ?>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                    </div>
                </div>
                <?php if(isset($utilisateur->contactLocal->idContact)){ ?>
                <div class="box">
                    <!-- Champs contact local -->
                    <?php include('vue/includes/userEdit/contactLocal/contactLocal.php'); ?>
                     <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer">Enregistrer</button>
                    </div>
                </div>
                <?php } ?> 
            </section>
        </div>
    </form>
</section>
<?php require_once('vue/layout/footer.php'); ?>
