<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  require_once('header-connexion.php');
  ?>
<form method="post">
  <h2><span class="entypo-login"></span> Connexion</h2>
  <button class="submit" name="action" type="hidden" value="validationFormulaire"><span class="entypo-lock"></span></button>
  <span class="entypo-user inputUserIcon"></span>
  <input type="text" class="user" name="emailConnexion" value="" placeholder="mail"/>
  <span class="entypo-key inputPassIcon"></span>
  <input type="password" name="passwordConnexion" class="pass"placeholder="mot de passe"/>
</form>
  <?php
 //require_once('footer.php'); 
