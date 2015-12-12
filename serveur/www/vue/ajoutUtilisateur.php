<?php require_once('header.php'); ?>

<h1> Ajouter un utilisateur </h1>
  <form method="post" action="index.php?controleur=controleurBenevol&action=ajouterUtilisateur">
    Nom: <input type="text" name="nom" placeholder="nom" />
    Prenom: <input type="text" name="prenom" placeholder="prenom" />
    Adresse mail: <input type="text" name="email" placeholder="exemple@gmail.com" />
    Adresse : </br>
    Numéro de rue: <input type="text" name="num_rue" placeholder="52" />
    Nom de la rue: <input type="text" name="nom_rue" placeholder="nom de rue" />
    Code postal: <input type="text" name="code_postal" placeholder="63000" />
    Nom de la ville: <input type="text" name="ville" placeholder="ville" />
     
    <button class="submit" name="boutonAjouter" value="ajouterUtilisateur">Ajouter</button>
</form>
  
<?php require_once('footer.php'); ?>