<?php 
/**
 * Vue hopitaux
 *             
 * Affiche tous les hopitaux
 *
 */
?>
<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
  <div class="content body">
     <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Liste des hôpitaux</h3>
                <?php if($utilisateurConnecter->idNiveau >=2 ){ ?>
                <div class="box-tools pull-right hidden-xs">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a href="index.php?action=ajouterHopital" class="btn btn-primary "><i class="fa fa-plus"></i> Ajouter un hopital</a>
                </div><!-- /.box-tools -->
                <?php } ?>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover" align=center>
                    <thead>
                        <tr>
                            <th class="hidden-xs hidden-sm">#</th>
                            <th>Nom</th>
                            <th class="hidden-xs hidden-sm">Service</th>
                            <th class="hidden-xs hidden-sm">Nombre de lits</th>
                             <?php if($utilisateurConnecter->idNiveau <2 ){ ?>
                             <th>Consultation</th>
                             <?php } else{ ?>
                             <th>Modifier</th>
                             <th class="hidden-xs">Supprimer</th>
                             <?php } ?>
                            
                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($hopitaux as $hopital){
                        ?>

                            <tr>
                                <td class="id hidden-xs hidden-sm"><?php echo $hopital["idHopital"]; ?></td>
                                <td>
                                    <?php echo $hopital["nomHopital"]; ?>
                                </td>
                                <td class="hidden-xs hidden-sm"><?php echo $hopital["service"]; ?></td>
                                <td class="hidden-xs hidden-sm"><?php echo $hopital["nbLits"]; ?></td>
                                <?php if($utilisateurConnecter->idNiveau <2 ){ ?>
                                <td><a href="index.php?action=afficherHopital&id=<?php echo $hopital["idHopital"]; ?>">Afficher</a></td>
                                <?php } else{ ?>
                                <td><a href="index.php?action=modifierHopital&id=<?php echo $hopital["idHopital"]; ?>">Modifier</a></td>
                                <td class="hidden-xs"><a href="index.php?action=supprimerHopital&id=<?php echo $hopital["idHopital"]; ?>">Supprimer</a></td>
                               
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>
                <a href="index.php?action=ajouterHopital" class="btn btn-primary hidden-sm hidden-md hidden-lg "><i class="fa fa-plus"></i> Ajouter un hopital</a>
            </div><!-- /.box-body -->
     </div>
  </div>
</section>
<?php
require_once('vue/layout/footer.php');
?>