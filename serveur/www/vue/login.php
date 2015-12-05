<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
if(controleurBenevol::creationSessionUtilisateur()) {
    header('Location: /');
  	exit();
}
else{
  include('header.php');
  ?>
<h1> Affichage moche qui va bientôt changer </h1>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Adresse mail: <input type="text" name="emailConnexion" value="" />
     
    Mot de passe: <input type="password" name="passwordConnexion" value="" />
     
    <input type="submit" name="connexion" value="Connexion" />
</form>
  <?php
    include('footer.php'); 
} ?>
