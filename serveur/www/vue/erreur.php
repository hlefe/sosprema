<?php 

require_once('header.php');
?>
<div id="contenute">
<h2> Erreur :</h2>
<?php
foreach ($vueErreur as $key => $value) {
	echo $value;
}?>
</div>
<?php
require_once('footer.php');
?>