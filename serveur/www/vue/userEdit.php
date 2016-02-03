<?php require('header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('erreur.php'); ?>
    <?php require_once('confirmation.php'); ?>
    <form method="post" action="index.php?action=adminModifierUtilisateur">
             <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Informations</h3>
                            <div class="box-tools pull-right">
                                <span class="label label-primary">Requis</span>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input class="form-control" required type="text" name="nom" value="<?php echo $utilisateur->nom;?>" />
                            </div>
                            <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input class="form-control" required type="text" name="prenom" value="<?php echo $utilisateur->prenom;?>" />
                            </div>
                            <div class="form-group">
                                    <label for="email">Adresse Mail</label>
                                    <input class="form-control" required type="email" name="email" value="<?php echo $utilisateur->email;?>" />
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="boutonAjouter" value="ajouterUtilisateur">Enregistrer</button>
                            <button type="submit" class="btn btn-warning" formaction="index.php?action=vueModifierMotDePasse">Modifier les droits et le mot de passe</button>
                        </div>
                    </div><!-- /.box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Divers</h3>
                            <div class="box-tools pull-right">
                                <span class="label label-primary">Facultatif</span>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nom">Avatar</label>
                                <?php require('includes/avatar_upload.php'); ?>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Profession</label>
                                <input class="form-control" type="text" name="profession" value="<?php echo $utilisateurConnecter->profession;?>" />
                            </div>
                            <div class="form-group">   
                                <label for="email">Divers</label>
                                <input class="form-control" type="text" name="divers" value="<?php echo $utilisateurConnecter->divers;?>" />
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" ame="boutonAjouter" value="ajouterUtilisateur">Enregistrer</button>
                        </div>
                    </div>
                </section><!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Adresse</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-primary">Facultatif</span>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php require('vue/includes/maps-address_field.php'); ?>   
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" ame="boutonAjouter" value="ajouterUtilisateur">Enregistrer</button>
                    </div>
                </div>
                </section>
            </div><!-- /.row (main row) -->
    </form>
</section>
<?php require('footer.php'); ?>
