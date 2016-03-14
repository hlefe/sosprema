<?php
/**
 * Vue erreur
 *             
 * Permet d'afficher une erreur
 *
 */
 ?>
<?php if(isset($vueErreur)){ ?>
		<?php
		//foreach ($vueErreur as $key => $value) {
		//	echo $value;
		//}
        print_r($vueErreur);
        
        ?>
<?php } ?>