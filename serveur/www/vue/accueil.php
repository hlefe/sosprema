<?php 
/**
 * Vue: Page principale
 *
 * Barre horizontale en haut de page, contient des informations relatives au statut de l'utilisateur courant (connecté, déconnecté)
 * 
 *
 *
 */
require('header.php');
?>
<div class="colonneGauche infosAccueil">
	<div id ="contenute" class="bandeau">
		<img src="vue/images/photobandeau.png" class="bandeau_accueil">
	</div>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
	<div id="contenute" class="Caccueil">
		<h3>État du projet</h3>
			<p>
				Interface de connexion et gestion des utilisateurs fonctionnelles.
			</p>
	</div>
	<div id="contenute" class="Caccueil">
		<h3> Tâches restantes </h3>
		<table class="table table-hover" align=center>
			<thead>
				<tr>
					<th>Num tâche</th>
					<th>Nom tâche</th>
					<th>Description tâche</th>
				</tr>
			</thead>
			<tbody>
					<tr>
						<td align=center class="id">1</td>
						<td align=center>
							Gestionnaire des hôpitaux
						</td>
						<td align=center></td>
					</tr>
					<tr>
						<td align=center class="id">2</td>
						<td align=center>
							Gestionnaire des contacts
						</td>
						<td align=center></td>
					</tr>
					<tr>
						<td align=center class="id">3</td>
						<td align=center>
							Gestionnaire des formations
						</td>
						<td align=center></td>
					</tr>
					<tr>
						<td align=center class="id">4</td>
						<td align=center>
							Cloud
						</td>
						<td align=center>Dépôt de fichiers type google drive</td>
					</tr>
			<tbody>
		</table>
                <a href="vue/tableauDeBord.php">Tableau de bord du site</a>
	</div>
>>>>>>> 6b68015... Tableau de bord
=======
>>>>>>> be84b26... Accueil remise après le deuxième achat
=======
>>>>>>> 1b77b11... Remise de l'ancienne version
=======
>>>>>>> 06e43bb... Et revoilà !
</div>

<!-- <div class="colonneGauche infosAccueil">
	<div id="contenute" class="Caccueil">
		<h3>État du projet</h3>
			<p>
				Interface de connexion et gestion des utilisateurs fonctionnelles.
			</p>
	</div>
	<div id="contenute" class="Caccueil">
		<h3> Tâches restantes </h3>
		<table class="table table-hover" align=center>
			<thead>
				<tr>
					<th>Num tâche</th>
					<th>Nom tâche</th>
					<th>Description tâche</th>
				</tr>
			</thead>
			<tbody>
					<tr>
						<td align=center class="id">1</td>
						<td align=center>
							Gestionnaire des hôpitaux
						</td>
						<td align=center></td>
					</tr>
					<tr>
						<td align=center class="id">2</td>
						<td align=center>
							Gestionnaire des contacts
						</td>
						<td align=center></td>
					</tr>
					<tr>
						<td align=center class="id">3</td>
						<td align=center>
							Gestionnaire des formations
						</td>
						<td align=center></td>
					</tr>
					<tr>
						<td align=center class="id">4</td>
						<td align=center>
							Cloud
						</td>
						<td align=center>Dépôt de fichiers type google drive</td>
					</tr>
			<tbody>
		</table>
	</div>
</div>
 -->
 
 <div id="contenute">
     <a href="vue/tableauDeBord.php">Tableau de bord</a>
 </div>
 
<div class="colonneDroite infosAccueil">
	<div  class="Caccueil abs_accueil">
		    <a class="twitter-timeline"  href="https://twitter.com/SOSPrema" data-widget-id="683938070039781376">Tweets de @SOSPrema</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>
<?php
require('footer.php');
?>