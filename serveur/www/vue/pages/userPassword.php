<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
    <form method="post" action="index.php?action=userPassword&edit=true">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Changer le mot de passe</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-primary">Requis</span>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="oldMDP">Mot de passe actuel</label>
                            <input class="form-control" required type="password" name="oldMDP" placeholder="mot de passe" />
                        </div>
                        <div class="form-group">
                            <label for="prenom">Nouveau mot de passe</label>
                            <input class="form-control" required type="password" name="newMDP" placeholder="mot de passe" />
                        </div>
                        <div class="form-group">
                            <label for="prenom">Confirmer nouveau mot de passe</label>
                            <input class="form-control" required type="password" name="newMDPVerif" placeholder="mot de passe" />
                        </div>
                        
                    </div>
                    <div class="box-footer">    
                        <button type="submit" class="btn btn-primary" name="boutonModifier" value="modifierMDP">Enregistrer</button>
                    </div>
                </div>
            </section>
        </div>
     </form>
</section>
<?php require_once('vue/layout/footer.php'); ?>