<div class="box-header with-border" style="cursor: initial; ">
    <h3 class="box-title" style="cursor: initial; ">Contacts internes à l'hôpital</h3>
    <?php if($_REQUEST['action'] != "afficherHopital") { ?>
    <?php } ?>
</div>
<ul class="users-list clearfix">
    <?php 
    $listeH = $hopital->listeContactHopital;
    if(isset($listeH)){
            foreach($listeH as $contact){
    ?>
    <li>
        <img src="vue/images/avatar.png" alt="User Image">
        <a class="users-list-name" href="#"><?php echo $contact->prenom ." ". $contact->nom; ?></a>
        <span class="users-list-date"><i class="fa fa-phone"> </i> <?php echo $contact->numero;  ?></span>
        <div class="box-tools hidden-xs hidden-sm">
             <a href="index.php?action=modifierHopital&idContactHopital=<?php echo $contact->idContactHopital; ?>"><button type="button" class="btn btn-box-tool bg-red" > <i class="fa fa-times"></i><b> Supprimer</b></button></a>
        </div>
    </li>
    <?php 
            }}
    ?>
    <li class="hidden-xs hidden-sm">
        <img src="vue/images/users-add-user-icon.png" alt="User Image">
        <a  href="#" data-poload="index.php?action=afficherTousLesContactsHopitaux">Ajouter</a>
    </li>
</ul>