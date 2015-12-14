<?php 

require_once('header.php');
?>
<div id="contenute">
<h2> Confirmation :</h2>
<?php
foreach ($vueConfirmation as $key => $value) {
	echo $value;
}
?>
</div>
<?php
require_once('footer.php');
?>