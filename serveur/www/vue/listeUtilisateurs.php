<?php
require_once('header.php');

?>

<table class="table table-hover" align=center>
	<thead>
		<tr>
			<th class="text-center">#</th>
			<th>Mail</th>
			<th>Nom</th>
			<th>Prénom</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach($listeUsers as $user){
		?>

			<tr>
				<td align=center class="id"><?php echo $user["id_utilisateur"]; ?></td>
				<td align=center>
					<?php echo $user["email"]; ?>
				</td>
				<td align=center><?php echo $user["nom"]; ?></td>
				<td align=center><?php echo $user["prenom"]; ?></td>
			</tr>
		<?php } ?>
	<tbody>
</table>
<?php
require_once('footer.php');
?>