<?php 

require_once('header.php');
?>

<h2> Confirmation :</h2>
<?php
foreach ($vueConfirmation as $key => $value) {
	echo $value;
}
require_once('footer.php');
?>