<div class="box-header with-border" style="cursor: initial; ">
    <h3 class="box-title" style="cursor: initial; ">Contacts locaux pour cet hôpital</h3>
</div>

<ul class="users-list clearfix">
    <?php 
    $listeL = $hopital->listeContactLocal;
    if(isset($listeL)){
            foreach($listeL as $contact){
    ?>
    <li>
        <img src="vue/images/avatar_local.png" alt="User Image">
        <a class="users-list-name" href="index.php?action=userEdit&mail=<?php echo $contact->email;?>"><?php echo $contact->prenom ." ". $contact->nom; ?></a>
        <span class="users-list-date"><?php echo $contact->telephones[0]->numero;?></span>
    </li>
    <?php 
            }}
    ?>
    <?php if($_REQUEST['action'] != "afficherHopital") { ?>
    <li>
        <img src="vue/images/users-add-user-icon.png" alt="User Image">
        <a  href="#" data-poload="index.php?action=afficherTousLesContactsLocaux&idHopital=<?php echo $hopital->idHopital; ?>">Ajouter</a>
    </li>
     <?php } ?>
</ul>