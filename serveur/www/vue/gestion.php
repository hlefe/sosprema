<?php
require_once('header.php');
?>

	    	<h2> Gestion </h2>
<div class="colonneGauche infosAccueil">
	<div id="contenute" class="Caccueil">
		<h3>Ajout d'utilisateurs</h3>
			<p>
				 <a href="index.php?action=vueAjoutUtilisateur"><span>Ajouter un utilisateur</span></a>
			</p>
	</div>
</div>
<div class="colonneDroite infosAccueil">
	<div id="contenute" class="Caccueil">
		<h3>Utilisateurs</h3>
		<a href="index.php?action=listeUtilisateurs"><span>Liste des utilisateurs</span></a>
	</div>
</div>

<?php
require_once('footer.php');
?>

