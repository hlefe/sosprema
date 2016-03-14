<?php
/**
 * Vue erreur
 *             
 * Permet d'afficher une erreur
 *
 */
 ?>
<?php 

require_once('vue/layout/header.php');
?>
<div id="contenute">
<h2> Erreur :</h2>
<?php
foreach ($vueErreur as $key => $value) {
	echo $value;
}?>
</div>
<?php
require_once('vue/layout/footer.php');
?>