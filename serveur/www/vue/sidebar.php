<?php 
/**
 * Vue: Sidebar principale (à gauche)
 *
 * Menu de navigation vertical à gauche de la page, contient aussi le logo
 * 
 *
 *
 */
$listePages = ModelPage::obtenirTout($utilisateurConnecter);
?>

<aside class="main-sidebar">
<!-- sidebar: style dispo dans le fichier sidebar.less -->
<section class="sidebar">
    <!-- LOGO -->
    <div class="sosP-logo">
        
        <!-- Logo Sos Préma -->
        <div class="pull-left logo">
            <img src="vue/images/logo.png" title="Sos Préma">
        </div>
    </div>
    <!-- Panneau utilisateur -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $utilisateurConnecter->avatar;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php 
print_r($utilisateurConnecter);
            echo $utilisateurConnecter->prenom;?> <?php echo $utilisateurConnecter->nom ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
        </div>
    </div>
    <!-- Menu de navigation: style dispo dans le fichier sidebar.less -->
    <ul class="sidebar-menu">
        <?php foreach($listePages as $page){ ?>
            <li>
                <a href="<?php echo $page["url"]; ?>">
                <i class="fa"><img src="vue/images/<?php echo $page["id"]; ?>.png"></i> <span><?php echo $page["nom"]; ?></span>
                </a>
            </li>
        <?php } ?>
    </ul>
</section>
</aside>