<?php if(isset($vueErreur)) { ?>
	<div id="contenute">
<h2> Erreur :</h2>
<?php
foreach ($vueErreur as $key => $value) {
	echo $value;
}?>
</div>
<?php } ?>