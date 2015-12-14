<?php require_once('header.php'); ?>
<div id="contenute">
<h1> Profil </h1>
  <form method="post" action="index.php?controleur=controleurBenevol&action=modifierUtilisateur">
    <label for="nom">Nom</label>
    <input required type="text" name="nom" value="<?php echo $utilisateurConnecter->nom;?>" />
    
    <label for="prenom">Prénom</label>
    <input required type="text" name="prenom" value="<?php echo $utilisateurConnecter->prenom;?>" />
    
    <label for="email">Adresse Mail</label>
    <input required type="text" name="email" value="<?php echo $utilisateurConnecter->email;?>" />
    
    <h2>Adresse :</h2></br>
    
    <label for="num_rue">Numéro de rue</label>
    <input type="text" name="num_rue" value="<?php echo $utilisateurConnecter->adresse->num_rue;?>" />
    
    <label for="nom_rue">Nom de rue</label>
    <input type="text" name="nom_rue" value="<?php echo $utilisateurConnecter->adresse->nom_rue;?>" />
    
    <label for="code_postal">Code postal</label>
    <input type="text" name="code_postal" value="<?php echo $utilisateurConnecter->adresse->code_postal;?>" />

    <label for="ville">Ville</label>
    <input type="text" name="ville" value="<?php echo $utilisateurConnecter->adresse->ville;?>" />
     
    <button class="submit" name="boutonAjouter" value="modifierUtilisateur">Modifier</button>

</form>
<form method="post" action="index.php?vueAppeller=modifierMDP">
    <button class="submit" name="boutonAjouter" value="modifierUtilisateur">Modifier mot de passe</button>
</form>
</div>
<?php require_once('footer.php'); ?>