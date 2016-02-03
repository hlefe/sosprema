<header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">  
            <!-- User Account: style can be found in dropdown.less -->
            <?php if(isset($utilisateurConnecter)){ ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo $utilisateurConnecter->avatar;?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $utilisateurConnecter->prenom;?> <?php echo $utilisateurConnecter->nom ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo $utilisateurConnecter->avatar;?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $utilisateurConnecter->prenom;?> <?php echo $utilisateurConnecter->nom ?>
                            </p>
                        </li>                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/index.php?action=profil" class="btn btn-default btn-flat">Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="/index.php?action=deconnexion" class="btn btn-default btn-flat">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        </div>
    </nav>
</header>