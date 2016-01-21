<?php
require_once('header.php');
require_once('erreur.php');
require_once('confirmation.php');
?>
<div class="contenuteSansFond">
	<div class="colonneGauche wtitre">
		<h2> Liste des utilisateurs</h2>
	</div>
	<div class="colonneDroite wtitre">
		<div class="green">
			<a href="index.php?action=vueAjoutUtilisateur" ><span>Ajouter un utilisateur</span></a>
		</div>
	</div>
</div>

<div id="contenute">
<table class="table table-hover" align=center>
	<thead>
		<tr>
			<th class="text-center">#</th>
			<th>Mail</th>
			<th>Nom</th>
			<th>Prénom</th>
            <th>Modifier</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach($listeUsers as $user){
		?>

			<tr>
				<td align=center class="id"><?php echo $user["idUtilisateur"]; ?></td>
				<td align=center>
					<?php echo $user["email"]; ?>
				</td>
				<td align=center><?php echo $user["nom"]; ?></td>
				<td align=center><?php echo $user["prenom"]; ?></td>
				<td align=center><a href="index.php?action=vueAdminModifierUtilisateur&mail=<?php echo $user["email"]; ?>">Modifier</a></td>
                <td align=center><a href="index.php?action=supprimerUtilisateur&mail=<?php echo $user["email"]; ?>">Supprimer</a></td>
			</tr>
		<?php } ?>
	<tbody>
</table>
</div>
<?php
require_once('footer.php');
?>