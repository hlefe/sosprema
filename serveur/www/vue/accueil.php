<?php 
/**
 * Vue: Page principale
 *
 * Barre horizontale en haut de page, contient des informations relatives au statut de l'utilisateur courant (connecté, déconnecté)
 * 
 *
 *
 */
require_once('header.php');
?>
<h2> Tableau de bord </h2>
<div class="colonneGauche infosAccueil">
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
<div class="colonneDroite infosAccueil">
	<div id="contenute" class="Caccueil">
		<h3>Questions</h3>
		<ul>
			<li> 
				<p>Le style / design est-il en harmonie avec le site SOSPrema ?</p>
			</li>
			<li> 
				<p>Rencontrez-vous des problèmes lors de l'utilisation des différentes fonctionnalités ?</p>
			</li>
			<li> 
				<p>Avez vous des suggestions d'amélioration, pour les fonctionnalités en ligne ?</p>
			</li>
		</ul>
	</div>
</div>
<?php
require_once('footer.php');
?>