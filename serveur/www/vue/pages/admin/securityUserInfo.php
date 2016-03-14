<?php 
/**
 * Vue securityuserinfo
 *             
 * Permet d'afficher les informations relatives à la sécurité d'un utilisateur
 *
 */
?>
<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
    <form method="post" action="index.php?action=safeUserInfo&edit=true">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 ">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sécurité et droits</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-primary">Requis</span>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        
                         <div class="col-xs-5">
                            <div class="form-group">
                                <label >Définir un niveau de responsabilité pour l'utilisateur</label>
                                <?php foreach($niveaux as $niveau){ ?>
                                    <div class="radio">
                                        <label>
                                        <input name="libelle_niveau" id="optionsRadios<?php echo $niveau['idNiveau']; ?>" value="<?php echo $niveau['nom']; ?>" <?php if($niveau['idNiveau'] == $utilisateurModifie->idNiveau) echo checked ?> type="radio">
                                            <?php echo $niveau['nom']; ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="form-group">
                                <label for="oldMDP">Réinitialiser le mot de passe</label>
                                <input class="form-control"   placeholder="Nouveau mot de passe" name="newMDP" />
                            </div>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Attention !</h4>
                                L'utilisateur ne pourra plus utiliser son ancien mot de passe.
                            </div>
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