<!-- <?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  //require_once('header-connexion.php');
  //require_once('erreur.php');
  ?>
<div class="loginForm">
  <img src="vue/images/logo.png" ></img>
</div>
<form method="post" action="index.php?action=connexion" class="loginForm">

  <h2><span class="entypo-login"></span> Connexion</h2>

  <button id="boutonConnexion" class="submit" name="action" type="hidden" value="connexion"><span class="entypo-lock"></span></button>
  
  <span class="entypo-user inputUserIcon"></span>
  <input type="text" class="user" name="emailConnexion" value="" placeholder="mail"/>
  <span class="entypo-key inputPassIcon"></span>
  <input type="password" name="passwordConnexion" class="pass"placeholder="mot de passe"/>
</form>
  <?php
//require_once('footer.php'); 
?>
-->

<?php 
/**
 * Vue: Page de connexion
 *
 *
 */
  require_once('header-connexion.php');
  require_once('erreur.php');
  ?>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="vue/images/logo.png" ></img>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Veuillez entrer vos informations de connexion:</p>
        <form method="post" action="index.php?action=connexion">
          <div class="form-group has-feedback">
            <input type="email" required class="form-control" name="emailConnexion" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" required class="form-control" name="passwordConnexion" placeholder="Mot de passe">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
            </div><!-- /.col -->
          </div>
        </form>
        <a href="#">Mot de passe oublié ?</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>