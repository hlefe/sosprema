<nav id="sidebar-navigation">
	<ul class="nav">
        <li class="<?php if($_GET['action'] == 'accueil'){ echo 'active'; }?>">
			<a href="index.php?action=accueil"><img src="vue/images/home.png"><span>Accueil</span></a>
        </li>
		<li class="<?php if($_GET['action'] == 'hopital'){ echo 'active'; }?>">
			<a href="index.php?action=accueil"><img src="vue/images/hospital-icon.png"><span>Hôpitaux</span></a>
		</li>
		<li class="<?php if($_GET['action'] == 'contact'){ echo 'active'; }?>">
			<a href="index.php?action=accueil"><img src="vue/images/user.png"><span>Contacts</span></a>
		</li>
		<li class="<?php if($_GET['action'] == 'profil'){ echo 'active'; }?>">
			<a href="index.php?action=profil"><img src="vue/images/settings.png"><span>Mon compte</span></a>
		</li>
		<li class="<?php if($_GET['action'] == 'gestion'){ echo 'active'; }?>">
			<a href="index.php?action=listeUtilisateurs"><img src="vue/images/users.png"><span>Gestion</span></a>
		</li>

	</ul>
</nav>