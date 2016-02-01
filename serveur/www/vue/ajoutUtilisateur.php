<?php require_once('header.php');
require_once('erreur.php');
require_once('confirmation.php');
?>
<!-- Main content -->
<section class="content">
    <form method="post" action="index.php?action=ajouterUtilisateur">
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
                                <input class="form-control" required type="text" name="nom"  />
                            </div>
                            <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input class="form-control" required type="text" name="prenom"  />
                            </div>
                            <div class="form-group">
                                    <label for="email">Adresse Mail</label>
                                    <input class="form-control" required type="email" name="email"  />
                            </div>
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
                                <input class="form-control" type="text" name="avatar" />
                            </div>
                            <div class="form-group">
                                <label for="prenom">Profession</label>
                                <input class="form-control" type="text" name="profession"  />
                            </div>
                            <div class="form-group">   
                                <label for="email">Divers</label>
                                <input class="form-control" type="text" name="divers"  />
                            </div>
                        </div>
                    </div>
                </section><!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                    <div class="box">
                         <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="boutonAjouter" value="ajouterUtilisateur">Ajouter</button>
                         </div>
                    </div>
                    <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adresse</h3>
                                <div class="box-tools pull-right">
                                    <span class="label label-primary">Facultatif</span>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="numRue">Numéro de rue</label>
                                    <input class="form-control" type="text" name="numRue"  />
                                </div>
                                <div class="form-group"> 
                                    <label for="nomRue">Nom de rue</label>
                                    <input class="form-control" type="text" name="nomRue" />
                                </div>
                                <div class="form-group">                  
                                    <label for="codePostal">Code postal</label>
                                    <input class="form-control" type="text" name="codePostal"  />
                                </div>
                                <div class="form-group">
                                    <label for="ville">Ville</label>
                                    <input class="form-control" type="text" name="nomVille"  />
                                </div>
                                <div class="form-group">
                                    <label for="departement">Département</label>
                                    <input class="form-control" type="text" name="nomDepartement"  />
                                </div>
                                <div class="form-group">
                                    <label for="region">Région</label>
                                    <input class="form-control" type="text" name="nomRegion"  />
                                </div>
                            </div>
                    </div>
                </section>
            </div><!-- /.row (main row) -->
     </form>
</section>
<?php require_once('footer.php'); ?>