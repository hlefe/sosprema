<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  include('header.php');
  ?>
<h1> Affichage moche qui va bientôt changer </h1>
  <form action="/controleur/sessionUtilisateur.php" method="post">
    Adresse mail: <input type="text" name="emailConnexion" value="" />
     
    Mot de passe: <input type="password" name="passwordConnexion" value="" />
     
    <input type="submit" name="connexion" value="Connexion" />
</form>
  <?php
    include('footer.php'); ?>
