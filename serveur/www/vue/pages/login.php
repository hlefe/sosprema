<?php 
/**
 * Vue login
 *
 * Permet de se connecter
 */
  require_once('vue/layout/header-connexion.php');
  require_once('vue/includes/erreur.php');
  ?>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="vue/images/logo.png" ></img>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Veuillez entrer vos informations de connexion</p>
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
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Avancée du projet</h3>
            </div>
            <div style="display: block;" class="box-body">
            Tableau de bord du projet
            </div>
            <!-- /.box-body -->
            <div style="display: block;" class="box-footer">
            <form method="post" action="index.php?action=tableau_de_bord">
                <button type="submit" class="btn btn-block btn-warning">Cliquer-ici pour accéder au tableau de bord</button>
            </form>
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-2">
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Identifiant administrateur</h3>
            </div>
            <div style="display: block;" class="box-body">
            compteAdmin@gmail.com
            </div>
            <!-- /.box-body -->
            <div style="display: block;" class="box-footer">
            admin
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
    
    <div class="col-sm-2">
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Identifiant bénévole</h3>
            </div>
            <div style="display: block;" class="box-body">
            compteBenevole@gmail.com
            </div>
            <!-- /.box-body -->
            <div style="display: block;" class="box-footer">
            benevole
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
    <div class="col-sm-1"></div>
    
    
  </body>