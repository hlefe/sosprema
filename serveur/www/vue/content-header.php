<header id="header" class="site-header">
	<span> Espace bénévoles</span>
	<nav id="header-navigation" >
		<div id="menu-utilisateur">
			<ul>
				<li class="item-menu-avec-enfants">
					<?php if(isset($_SESSION['sessionUtilisateur'])){ ?>
						<a href="/">Bienvenue, <?php printf("%s %s", $_SESSION['sessionUtilisateur']->prenom, $_SESSION['sessionUtilisateur']->nom); ?>
													</a>
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