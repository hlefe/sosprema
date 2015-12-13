<?php 

require_once('header.php');
?>

<h2> Erreur :</h2>
<?php
foreach ($vueErreur as $key => $value) {
	echo $value;
}
require_once('footer.php');
?>