<nav id="sidebar-navigation">
	<ul class="nav">
            <li class="<?php if($_GET['vueAppeller'] == 'accueil'){ echo 'active'; }?>">
			<a href="index.php?vueAppeller=accueil"><img src="vue/images/home.png"><span>Accueil</span></a>
            </li>
		<li class="<?php if($_GET['vueAppeller'] == 'hopital'){ echo 'active'; }?>">
			<a href="index.php?vueAppeller=accueil"><img src="vue/images/hospital-icon.png"><span>Hôpitaux</span></a>
		</li>
		<li class="<?php if($_GET['vueAppeller'] == 'contact'){ echo 'active'; }?>">
			<a href="index.php?vueAppeller=accueil"><img src="vue/images/user.png"><span>Contacts</span></a>
		</li>
		<li class="<?php if($_GET['vueAppeller'] == 'profil'){ echo 'active'; }?>">
			<a href="index.php?vueAppeller=profil"><img src="vue/images/settings.png"><span>Mon compte</span></a>
		</li>
		<li class="<?php if($_GET['vueAppeller'] == 'gestion'){ echo 'active'; }?>">
			<a href="index.php?vueAppeller=gestion"><img src="vue/images/users.png"><span>Gestion</span></a>
		</li>

	</ul>
</nav>