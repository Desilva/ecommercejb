<div id="jualBisnisDiv">
	<?php
		if(isset($_GET['subPage'])){
			include $_GET['subPage'].".php";
		}else{
			include "beli.php";
		}
	?>
</div>
