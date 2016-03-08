<div class="box-header with-border" style="cursor: initial; ">
    <h3 class="box-title" style="cursor: initial; ">Contacts locaux pour cet hôpital</h3>
</div>

<ul class="users-list clearfix">
    <?php if(isset($hopital->listeContactLocal)){
        if($hopital->listeContactLocal != null){
            foreach($hopital->listeContactLocal as $contact){
    ?>
    <li>
        <img src="vue/style/dist/img/user1-128x128.jpg" alt="User Image">
        <a class="users-list-name" href="#">Fabrice Opry <?php echo $contact->nom; ?></a>
        <span class="users-list-date">06 86 60 02 12</span>
    </li>
    <?php 
            }}}
    ?>
    <?php if($_REQUEST['action'] != "afficherHopital") { ?>
    <li>
        <img src="vue/images/users-add-user-icon.png" alt="User Image">
        <a class="users-list-name" href="#">Ajouter</a>
    </li>
     <?php } ?>
</ul>