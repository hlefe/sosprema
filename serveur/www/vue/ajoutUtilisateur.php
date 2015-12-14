<?php require_once('header.php'); ?>
<div id="contenute">
<h1> Ajouter un utilisateur </h1>
  <form method="post" action="index.php?controleur=controleurAdmin&action=ajouterUtilisateur">
    <label for="nom">Nom</label>
    <input required type="text" name="nom" placeholder="nom" />
    
    <label for="prenom">Prénom</label>
    <input required type="text" name="prenom" placeholder="prenom" />
    
    <label for="email">Adresse Mail</label>
    <input required type="text" name="email" placeholder="exemple@gmail.com" />
    
    <h2>Adresse :</h2></br>
    
    <label for="num_rue">Numéro de rue</label>
    <input type="text" name="num_rue" placeholder="52" />
    
    <label for="nom_rue">Nom de rue</label>
    <input type="text" name="nom_rue" placeholder="nom de rue" />
    
    <label for="code_postal">Code postal</label>
    <input type="text" name="code_postal" placeholder="63000" />

    <label for="ville">Ville</label>
    <input type="text" name="ville" placeholder="ville" />
     
    <button class="submit" name="boutonAjouter" value="ajouterUtilisateur">Ajouter</button>
</form>
</div> 
<?php require_once('footer.php'); ?>