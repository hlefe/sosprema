<?php require_once('header.php'); ?>

<h1> Profil </h1>
  <form method="post" action="index.php?controleur=controleurBenevol&action=modifierMotDePasse">
    <label for="oldMDP">Mot de passe actuel</label>
    <input required type="password" name="oldMDP" placeholder="mot de passe" />
    
    <label for="prenom">Nouveau mot de passe</label>
    <input required type="password" name="newMDP" placeholder="mot de passe" />

    <label for="prenom">Confirmer nouveau mot de passe</label>
    <input required type="password" name="newMDPVerif" placeholder="mot de passe" />

    <button class="submit" name="boutonModifier" value="modifierMDP">Modifier</button>

</form>
  
<?php require_once('footer.php'); ?>