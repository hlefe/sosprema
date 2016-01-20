<?php require_once('header.php'); 
require_once('erreur.php');
require_once('confirmation.php');
?>
<div id="contenute">
<h1> Profil </h1>
  <form method="post" action="index.php?action=modifierMotDePasse">
    <label for="oldMDP">Mot de passe actuel</label>
    <input required type="password" name="oldMDP" placeholder="mot de passe" />
    
    <label for="prenom">Nouveau mot de passe</label>
    <input required type="password" name="newMDP" placeholder="mot de passe" />

    <label for="prenom">Confirmer nouveau mot de passe</label>
    <input required type="password" name="newMDPVerif" placeholder="mot de passe" />

    <button class="submit" name="boutonModifier" value="modifierMDP">Modifier</button>

</form>
</div>
<?php require_once('footer.php'); ?>