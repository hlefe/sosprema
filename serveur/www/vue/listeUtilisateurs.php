<?php require('header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('erreur.php'); ?>
    <?php require_once('confirmation.php'); ?>
  <div class="content body">
     <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Liste des utilisateurs</h3>
                <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a href="index.php?action=vueAjoutUtilisateur" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un utilisateur</a>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover" align=center>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mail</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($listeUsers as $user){
                        ?>

                            <tr>
                                <td class="id"><?php echo $user["idUtilisateur"]; ?></td>
                                <td>
                                    <?php echo $user["email"]; ?>
                                </td>
                                <td><?php echo $user["nom"]; ?></td>
                                <td><?php echo $user["prenom"]; ?></td>
                                <td><a href="index.php?action=vueAdminModifierUtilisateur&mail=<?php echo $user["email"]; ?>">Modifier</a></td>
                                <td><a href="index.php?action=supprimerUtilisateur&mail=<?php echo $user["email"]; ?>">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>
            </div><!-- /.box-body -->
     </div>
  </div>
</section>
<?php
require_once('footer.php');
?>