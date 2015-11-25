<?php 
/**
 * Vue: En tête du site
 *
 * Barre horizontale en haut de page, contient des informations relatives au statut de l'utilisateur courant (connecté, déconnecté)
 * 
 *
 *
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
	<link href="/vue/style/style.css" rel="stylesheet" /> 
    </head>
    <body>
    <section id="wrapper">
    	<aside class="sidebar">
    		<section class="box">
    			<header>
    				<h1 id="titre-site"><a href="/" rel="home"><img src="vue/images/logo.png"></a></h1>
    			</header>
    			<nav id="sidebar-navigation">
    				<ul class="nav">
    					<li>
    						<a href="/"><img src="vue/images/home.png"><span>Accueil</span></a>
    					</li>
    					<li class="active">
    						<a href="/"><img src="vue/images/hospital-icon.png"><span>Hôpitaux</span></a>
    					</li>
    					<li>
    						<a href="/"><img src="vue/images/user.png"><span>Contacts</span></a>
    					</li>
    					<li>
    						<a href="/"><img src="vue/images/settings.png"><span>Mon compte</span></a>
    					</li>
    					<li>
    						<a href="/"><img src="vue/images/users.png"><span>Gestion</span></a>
    					</li>

    				</ul>
    			</nav>
    		</section>
    	</aside>
    	<section id="contenu">
    		<section class="box">
    			<header id="header" class="site-header">
    				<span> Espace bénévoles</span>
					<nav id="header-navigation" >
						<div id="menu-utilisateur">
							<ul>
								<li class="item-menu-avec-enfants">
									<?php if ( 'utilisateur_connecté' ){ ?>
										<a href="/">Bienvenue, <?php echo 'Louise Dupont' ?></a>
										<ul class="enfants">
											<li>
												<a href="/">Mon profil</a>
											</li>
											<li>
												<a href="/">Déconnexion</a>
											</li>
										</ul>
									<?php } else { ?>
										<a href="/">Connexion</a>
									<?php } ?>
								</li>
							</ul>
						</div>
					</nav>
				</header>
				<section class="content">
    	
    	