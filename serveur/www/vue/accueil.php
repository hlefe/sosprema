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
		<h3>Ce qu'on a fait</h3>
			<p>
				De la merde, beaucoup beaucoup !! Je suis en rute !!
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
							Faire caca
						</td>
						<td align=center>Auux toilettes</td>
					</tr>
					<tr>
						<td align=center class="id">2</td>
						<td align=center>
							Faire pipi
						</td>
						<td align=center>Par terre</td>
					</tr>
					<tr>
						<td align=center class="id">3</td>
						<td align=center>
							Faire chier
						</td>
						<td align=center>Les gens</td>
					</tr>
					<tr>
						<td align=center class="id">4</td>
						<td align=center>
							Faire l'amour
						</td>
						<td align=center>A Jawad</td>
					</tr>
			<tbody>
		</table>
	</div>
</div>
<div class="colonneDroite infosAccueil">
	<div id="contenute" class="Caccueil">
		<h3>Questions</h3>
		<ul>
			<li> ça va ?
			</li>
			<li> Oui et toi ?
			</li>
			<li> Moi tranquille
			</li>
			<li> Ok !
			</li>

		</ul>
	</div>
</div>
<?php
require_once('footer.php');
?>