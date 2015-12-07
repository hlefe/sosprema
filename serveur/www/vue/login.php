<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  include('header.php');
  ?>
<h1> Affichage moche qui va bientôt changer </h1>
  <form method="post">
    Adresse mail: <input type="text" name="emailConnexion" value="" />
     
    Mot de passe: <input type="password" name="passwordConnexion" value="" />
     
    <input type="submit" name="connexion" value="Connexion" />
    <!-- action envoyée au contrôleur -->
    <input type="hidden" name="action" value="validationFormulaire">
</form>
  <?php
    include('footer.php'); 

