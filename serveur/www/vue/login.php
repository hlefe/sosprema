<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  include('header-connexion.php');
  ?>
<form action="new controleurBenevol?acrion=validationFormulaire" method="post">
  <h2><span class="entypo-login"></span> Connexion</h2>
  <button class="submit" name="action" type="hidden" value="validationFormulaire"><span class="entypo-lock"></span></button>
  <span class="entypo-user inputUserIcon"></span>
  <input type="text" class="user" name="emailConnexion" value="" placeholder="mail"/>
  <span class="entypo-key inputPassIcon"></span>
  <input type="password" name="passwordConnexion" class="pass"placeholder="mot de passe"/>
</form>
  <?php
 //include('footer.php'); 
