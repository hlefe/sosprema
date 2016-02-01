<?php if(isset($vueErreur)){ ?>
		<h2> Erreur :</h2>
		<?php
		foreach ($vueErreur as $key => $value) {
			echo $value;
		}?>
<?php } ?>