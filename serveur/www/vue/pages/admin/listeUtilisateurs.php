<?php require('vue/layout/header.php'); ?>
<!-- Main content -->
<section class="content">
    <?php require_once('vue/includes/erreur.php'); ?>
    <?php require_once('vue/includes/confirmation.php'); ?>
  <div class="content body">
     <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
               
                <a href="index.php?action=ajoutUtilisateur" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un utilisateur</a>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                
                
                
                
                
                
                
                
                
     
 <div class="nav-tabs-custom" style="cursor: move;">
    <ul class="nav nav-tabs  " style="cursor: initial; ">
        <li class="active"><a aria-expanded="true" href="#tab_1-1" data-toggle="tab">Tous les utilisateurs</a></li>
        <li class=""><a aria-expanded="false" href="#tab_2-2" data-toggle="tab">Contacts locaux</a></li>
    </ul>
    <div class="tab-content" style="cursor: initial; ">
        <div class="tab-pane active" id="tab_1-1" style="cursor: initial; ">
            <table class="table table-hover" align=center>
                    <thead>
                        <tr>
                            <th class="hidden-xs hidden-sm">#</th>
                            <th class="hidden-xs hidden-sm">Nom</th>
                            <th class="hidden-xs hidden-sm">Prénom</th>
                            <th class="hidden-xs hidden-sm">Mail</th>
                            <th class="hidden-md hidden-lg">Utilisateur</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($listeUsers as $user){
                        ?>

                            <tr>
                                <td class="hidden-xs hidden-sm id"><?php echo $user["idUtilisateur"]; ?></td>
                                <td class="hidden-xs hidden-sm"><?php echo $user["nom"]; ?></td>
                                <td class="hidden-xs hidden-sm"><?php echo $user["prenom"]; ?></td>
                                <td class="hidden-xs hidden-sm"><?php echo $user["email"]; ?></td>
                                <td class="hidden-md hidden-lg">
                                    <?php echo  $user["prenom"] . " " . $user["nom"]; ?>
                                </td>
                                <td><a href="index.php?action=userEdit&mail=<?php echo $user["email"]; ?>">Modifier</a></td>
                                <td><a href="index.php?action=listeUtilisateurs&mail=<?php echo $user["email"]; ?>">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2-2">
             <table class="table table-hover" align=center>
                    <thead>
                        <tr>
                            <th class="hidden-xs hidden-sm">#</th>
                            <th class="hidden-xs hidden-sm">Mail</th>
                            <th class="hidden-xs hidden-sm">Nom</th>
                            <th class="hidden-xs hidden-sm">Prénom</th>
                            <th class="hidden-md hidden-lg">Utilisateur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($contactsLocaux as $user){
                             $contact=UtilisateurGateway::rechercheUtilisateurId($user["idUtilisateur"]);
                        ?>

                            <tr>
                                <td class="hidden-xs hidden-sm id"><?php echo $user["idUtilisateur"]; ?></td>
                                <td class="hidden-xs hidden-sm">
                                    <?php echo $contact->email; ?>
                                </td>
                                <td class="hidden-xs hidden-sm"><?php echo $contact->nom; ?></td>
                                <td class="hidden-xs hidden-sm"><?php echo $contact->prenom; ?></td>
                                <td class="hidden-md hidden-lg">
                                    <?php echo  $contact->prenom . " " . $contact->nom; ?>
                                </td>
                                <td><a href="index.php?action=userEdit&mail=<?php echo $contact->email; ?>">Modifier compte</a></td>
                                <td><a href="index.php?action=listeUtilisateurs&mail=<?php echo $contact->email; ?>">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>
            
        </div>
        <!-- /.tab-pane -->
    </div>
<!-- /.tab-content -->
</div>
            </div><!-- /.box-body -->
     </div>
  </div>
</section>
<?php
require_once('vue/layout/footer.php');
?>