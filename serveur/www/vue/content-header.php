<header id="header" class="site-header">
	<span> Espace bénévoles</span>
	<nav id="header-navigation" >
		<div id="menu-utilisateur">
			<ul>
				<li class="item-menu-avec-enfants">
					<?php if(isset($utilisateurConnecter)){ ?>
						<a href="index.php?action=profil">Bienvenue, <?php printf("%s %s", $utilisateurConnecter->prenom, $utilisateurConnecter->nom); ?>
													</a>
						<ul class="enfants">
							<li>
								<a href="index.php?action=profil">Mon profil</a>
							</li>
							<li>
								<a href="index.php?action=deconnexion">Déconnexion</a>
							</li>
						</ul>
					<?php } else { ?>
						<a href="index.php?action=vueConnexion">Connexion</a>
					<?php } ?>
				</li>
			</ul>
		</div>
	</nav>
</header>