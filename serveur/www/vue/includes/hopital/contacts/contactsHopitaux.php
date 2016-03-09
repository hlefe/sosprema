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
        <a class="users-list-name" href="#"><?php echo $contact->prenom ." ". $contact->nom;?></a>
        <span class="users-list-date"><?php echo $contact->numero; ?></span>
    </li>
    <?php 
            }}
    ?>
    <li>
        <img src="vue/images/users-add-user-icon.png" alt="User Image">
        <a  href="#" data-poload="index.php?action=afficherTousLesContactsHopitaux">Ajouter</a>
    </li>
</ul>
